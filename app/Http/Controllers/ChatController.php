<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function __construct()
    {       
        $this->middleware('auth');
    }

    public function chat_with(User $user){
        $user_a = auth()->user();
        $user_b = $user;

        $chat = $user_a->chats()->wherehas('users', function($q) use ($user_b){
            $q->where('chat_user.user_id', $user_b->id);
        })->first();

        if(!$chat){
            $chat = Chat::create([
                'type' => 'private'
            ]);
            $chat->users()->sync([$user_a->id,$user_b->id]);
        }

        return redirect()->route('chat.show', $chat);
    }

    public function index(Chat $chat){

        abort_unless($chat->users->contains(auth()->id()), 403);
        return view('chat', [
            'chat' => $chat
        ]);
    }

    public function get_users(Chat $chat){
        $user = $chat->users;

        return response()->json([
            'users' => $user
        ]);
    }

    public function get_message(Chat $chat){
        $messages = $chat->messages()->with('user')->get();

        return response()->json([
            'messages' => $messages
        ]);
    }

    public function getAllContacts()
    {
        return DB::table('chat_user')
        ->select('users.id', 'users.name', 'chats.id AS id_room')
        ->join('chats', 'chat_user.chat_id', 'chats.id')
        ->join('users', 'chat_user.user_id', 'users.id')
        ->whereIn('chat_id', function ($query) {
            $query->select('chat_user.chat_id')->from('chat_user')
            ->Where('user_id', auth()->user()->id);
        });
    }

    public function get_contacts()
    {
        return $this->getAllContacts()->where([
            ['user_id','!=',auth()->user()->id],
            ['chats.type','=',"private"],
        ])->get();       
    }

    public function get_groups()
    {
        $userGroup = $this->getAllContacts()
        ->select('users.id', 'users.name', 
                 'chats.id AS id_room',
                 'chats.nombre AS name_room'
                )
        ->where([
            ['user_id','!=',auth()->user()->id],
            ['chats.type','=',"group"],
        ])
        ->get();  
        //convertir de un objeto a un array
        $result = json_encode($userGroup);
        $output = json_decode($result, true);
        return $this->groupArray($output, 'id_room');
    }

    function groupArray($array,$groupkey){
        $data = array();
        if (count($array)>0){
            //quitamos la llave
            $keys = array_keys($array[0]);
            $removekey = array_search($groupkey, $keys);
            if ($removekey===false)
                $data = array("Clave \"$groupkey\" no existe");
            else
                unset($keys[$removekey]);
                unset($keys[3]);
           
            
            $groupcriteria = array();
            $return=array();

            foreach($array as $value)
            {
                $item=null;
                foreach ($keys as $key)
                {
                    $item[$key] = $value[$key];
                }

                $busca = array_search($value[$groupkey], $groupcriteria);
                
                if ($busca === false)
                {
                    $groupcriteria[]=$value[$groupkey];

                    $return[]=array(
                        $groupkey=>$value[$groupkey],
                        'name_room'=>$value['name_room'],
                        'integrantes'=>array());

                    $busca=count($return)-1;
                }
                $return[$busca]['integrantes'][]=$item;
            }
        return $return;
     }
    
        return $data;
    }

    public function sent(Request $request){
        $message = auth()->user()->messages()->create([
            'content' => $request->message,
            'chat_id' => $request->chat_id,
        ])->load('user');

        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }

}
