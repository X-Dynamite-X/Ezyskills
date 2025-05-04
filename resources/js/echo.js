import $ from "jquery";
import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;


window.Echo = new Echo({
    broadcaster: import.meta.env.VITE_PUSHER_BROADCAST_DRIVER,
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
    authEndpoint: "/broadcasting/auth",
});
const userId = $("#user-header").data("user-id");

const trainerChannel = window.Echo.private("trainer_channel_" + userId);
trainerChannel.listen(".trainer_event", function (data) {
    console.log(data);
    showNotification(data.message || JSON.stringify(data));
});

window.coursesList.forEach((courseId) => {
    window.Echo.private(`course_channel_${courseId}`).listen(
        ".course_event",
        function (data) {
            showNotification(data.message || JSON.stringify(data));
        }
    );
});

function showNotification(message) {
    const notification = $(`
       <div
            class="fixed top-4 right-4 z-50 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg transition-opacity duration-300 max-w-md">
            <button class="absolute top-2 right-2 text-white hover:bg-blue-600 rounded-full p-1  ml-2"
                onclick="this.parentElement.remove()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <div class="m-1 ">
                ${message}
            </div>
        </div>
    `).appendTo("#notifications");

    // Auto-remove after 5 seconds
    setTimeout(() => {
        notification.fadeOut(300, function () {
            $(this).remove();
        });
    }, 5000);
}
