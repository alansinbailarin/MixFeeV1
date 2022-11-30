const msgerForm = get("msger-inputarea");
const msgerInput = get("msger-input");
const msgerChat = get("messages");
const chatWith = get("chatWith");
const chatWithImg = get("chatWithImg");
const chatFriends = get("friends");
const scroll = get("scroll");
const chatStatus = get("chatStatus");
const typing = get("typing");

const chatId = window.location.pathname.substring(9);
var authUser;
let typingTimer = false;

window.onload = () => {
    msgerInput.addEventListener("keypress", () => {
        sendTypingMessage();
    });
    document.body.style.maxHeight = "100vh";
    document.body.style.overflow = "hidden";
    axios
        .get("/auth/user")
        .then((res) => {
            authUser = res.data.authUser;
        })
        .then(() => {
            axios.get(`${chatId}/get_user`).then((res) => {
                let results = res.data.users.filter(
                    (user) => user.id != authUser.id
                );
                if (results.length > 0) {
                    chatWith.innerHTML = results[0].name;
                    chatWithImg.src = getAvatar(results[0].name, false);
                }
            });
        })
        .then(() => {
            axios.get(`${chatId}/get_messages`).then((res) => {
                appendMessagesFromDB(res.data.messages);
            });
        });

    axios.get("http://127.0.0.1:8000/api/contacts").then((res) => {
        res.data.forEach((res) => {
            let avatar = getAvatar(res.name, false);
            const friends = `<a href="${res.id_room}">
            <div class="flex flex-row items-center hover:bg-gray-50 p-2">
                                <img class=" ml-4 h-9 w-9 rounded-full" src="${avatar}" alt="">
                                <div class="ml-2 text-sm font-semibold">${res.name}</div>
                             </div></a> `;
            chatFriends.insertAdjacentHTML("beforeend", friends);
        });
    });
};

msgerForm.addEventListener("click", (event) => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    axios
        .post("sent", {
            message: msgText,
            chat_id: chatId,
        })
        .then((res) => {
            let { data } = res;
            let avatar = getAvatar(data.user.name, true);
            appendMessage(avatar, "right", data.content);
        })
        .catch((error) => {
            console.error("Ha ocurrido un error");
            console.error(error);
        });

    msgerInput.value = "";
});

function appendMessagesFromDB(messages) {
    let side = "left";

    messages.forEach((message) => {
        let avatar = getAvatar(
            message.user.name,
            message.user_id == authUser.id
        );
        side = message.user_id == authUser.id ? "right" : "left";
        appendMessage(avatar, side, message.content);
    });
}

function appendMessage(img, side, text) {
    const msgHTMLeft = `
    <div class="col-start-1 col-end-8 p-3 rounded-lg">
        <div class="flex flex-row items-center">
            <img class="h-9 w-9 rounded-full" src="${img}" alt="">
            <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                <p>${text}</p>
            </div>
        </div>
    </div> `;
    const msgHTMLRight = `    
    <div class="col-start-6 col-end-13 p-3 rounded-lg">
        <div class="flex items-center justify-start flex-row-reverse">
            <img class="h-9 w-9 rounded-full" src="${img}" alt="">
            <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                <p>${text}</p>
            </div>
        </div>
    </div>`;

    msgerChat.insertAdjacentHTML(
        "beforeend",
        side == "left" ? msgHTMLeft : msgHTMLRight
    );
    scrollToBottom();
}
// Echo Laravel
window.Echo.join(`chat.${chatId}`)
    .listen("MessageSent", (e) => {
        let avatar = getAvatar(e.message.user.name, false);
        appendMessage(avatar, "left", e.message.content);
    })
    .here((users) => {
        let results = users.filter((user) => user.id != authUser.id);
        if (results.length > 0) {
            chatStatus.classList.add("bg-green-600");
            chatStatus.classList.remove("bg-rose-600");
        }
    })
    .joining((users) => {
        if (users.id != authUser.id) {
            chatStatus.classList.add("bg-green-600");
            chatStatus.classList.remove("bg-rose-600");
        }
    })
    .leaving((users) => {
        if (users.id != authUser.id) {
            chatStatus.classList.add("bg-red-600");
            chatStatus.classList.remove("bg-green-600");
        }
    })
    .listenForWhisper("typing", (e) => {
        if (e > 0) typing.style.display = "";
        if (typingTimer) {
            clearTimeout(typingTimer);
        }

        typingTimer = setTimeout(() => {
            typing.style.display = "none";
            typingTimer = false;
        }, 3000);
    });

// Utils
function get(selector, root = document) {
    return root.getElementById(selector);
}

function scrollToBottom() {
    scroll.scrollTop = scroll.scrollHeight;
}

function getAvatar(name, type) {
    var res = name.split(" ");
    let nameL = res[0].charAt(0);
    let firstNameL = res[1].charAt(0);
    let colors;
    type
        ? (colors = "&color=7F9CF5&background=EBF4FF")
        : (colors = "&color=000000&background=fed7aa");

    let str = `https://ui-avatars.com/api/?name=${nameL}+${
        firstNameL + colors
    }`;
    return str;
}

function sendTypingMessage() {
    Echo.join(`chat.${chatId}`).whisper("typing", msgerInput.value.length);
}
