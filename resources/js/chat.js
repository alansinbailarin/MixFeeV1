const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
const chatWith = get(".chatWith");
const typing = get(".typing");
const chatStatus = get(".chatStatus");
const chatId = window.location.pathname.substring(9);
var authUser;

window.onload = () => {
    axios
        .get("/auth/user")
        .then((res) => {
            authUser = res.data.authUser;
        })
        .then(() => {
            axios.get(`2/get_user`).then((res) => {
                let results = res.data.users.filter(
                    (user) => user.id != authUser.id
                );
                if (results.length > 0) {
                    chatWith.innerHTML = results[0].name;
                }
            });
        })
        .then(() => {
            axios.get(`1/get_messages`).then((res) => {
                appendMessagesFromDB(res.data.messages);
            });
        });
};

msgerForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    axios
        .post("sent", {
            message: msgText,
            chat_id: 1,
        })
        .then((res) => {
            let { data } = res;
            appendMessage(data.user.name, "", "right", data.content);
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
        side = message.user_id == authUser.id ? "right" : "left";
        appendMessage(message.user.name, "", side, message.content);
    });
}

function appendMessage(name, img, side, text) {
    //   Simple solution for small apps
    const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    scrollToBottom();
}
// Echo Laravel

window.Echo.join(`chat.1`).listen("MessageSent", (e) => {
    appendMessage(e.message.user.name, "", "left", e.message.content);
});

// Utils
function get(selector, root = document) {
    return root.querySelector(selector);
}

function formatDate(date) {
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${h.slice(-2)}:${m.slice(-2)}`;
}

function scrollToBottom() {
    msgerChat.scrollTop = msgerChat.scrollHeight;
}
