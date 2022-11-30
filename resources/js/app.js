import "./bootstrap";
import Alpine from "alpinejs";
import axios from "axios";

window.Alpine = Alpine;

Alpine.start();
// metodo a eliminar
document.addEventListener("DOMContentLoaded", () => {
    axios.get("http://127.0.0.1:8000/api/contacts").then((res) => {
        if (res.data.length != 0) {
            document
                .getElementById("messageLink")
                .setAttribute("href", `message/${res.data[0].id_room}`);
            document.getElementById("messageIcon").classList.remove("hidden");
        }
    });
});
