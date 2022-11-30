<!-- component -->

<x-app-layout>
  <style>
    #scroll::-webkit-scrollbar {
              width: 4px;
              cursor: pointer;
              background-color: rgba(229, 231, 235, var(--bg-opacity));
  
          }
          #scroll::-webkit-scrollbar-thumb {
              cursor: pointer;
              background-color: #a0aec0;
          } 
  </style>

<div class="">
  <!--poner la clase h-screen -->
<div class="flex antialiased text-gray-800">
  <div class="flex flex-row h-full w-full overflow-x-hidden">
    {{-- friends --}}
    <div class="flex flex-col w-64 bg-white flex-shrink-0 ">
      <div class="flex flex-col">
        <div class="flex flex-row px-3 py-3 items-center justify-between text-xs">
          <span class="font-bold">Conversaciones</span>
        </div>
        <div class="flex flex-col space-y-1 mt-4 -mx-2 h-90 overflow-y-auto" id="friends">
                
        </div>
      </div>
    </div>
    {{-- mensages --}}
    <div class="flex flex-col flex-auto h-[90vh] p-6">
      <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full">
        {{-- header --}}
        <div class="flex flex-row items-center h-16  bg-white w-full px-4 py-4 rounded-t-2xl">
          <div class="flex-grow">
            <div class="flex flex-row items-center p-2">
              <img id="chatWithImg" class="h-9 w-9 rounded-full" src="https://ui-avatars.com/api/?name=m+f&color=000000&background=fed7aa" alt="">
              <div id="chatStatus" class="w-3 h-3 rounded-full bg-red-600" style="margin-left: -13px;margin-bottom: -24px;"></div>
              <div class="ml-2 text-sm font-semibold" id="chatWith"></div>
            </div> 
          </div>
          <div id="typing" class="italic text-xs text-gray-400 mr-4" style="display: none">Está escribiendo</div>
        </div>
        {{-- mensajes --}}
        <div id="scroll" class="flex flex-col h-full overflow-x-auto">
          <div class="flex flex-col h-full px-2">
            <div class="grid grid-cols-12 gap-y-2" id="messages">
         
            </div>
          </div>
        </div>
        {{-- sender --}}
        
         <form id="msger-inputarea"> <div class="flex flex-row items-center h-16 bg-white w-full px-4 py-4 rounded-b-2xl">
          <div class="flex-grow">
              <input
                type="text"
                id="msger-input"
                class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
              />
          </div>
          <div class="ml-4">  
          <button type="submit"  class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                <span>Send</span>
                <span class="ml-2">
                  <svg
                    class="w-4 h-4 transform rotate-45 -mt-px"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                    ></path>
                  </svg>
                </span>
              </button>            
          </div></div></form>
        
      </div>
    </div>
  </div>
</div>
</div>
  @vite('resources/js/chat.js')
</x-app-layout>
