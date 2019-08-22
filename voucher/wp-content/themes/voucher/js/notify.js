// request permission on page load
document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('Notification title', {
      icon: 'https://thammyvienthienkhue.vn/voucher/wp-content/uploads/2018/05/logo-notify.png',
      body: "Hey there! You've been notified!",
    });

    notification.onclick = function () {
      window.open("https://thammyvienthienkhue.vn/voucher/");      
    };

  }

}