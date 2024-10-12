document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "nicole" && password === "edjay123") {
      window.location.href = "../home.html";
    } else {
      alert("Sala kay mango ka!");
    }
  });
