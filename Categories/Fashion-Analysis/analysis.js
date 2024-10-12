const analysis = document.getElementById("analysis");
const style = document.getElementById("styles");
const trends = document.getElementById("trends");
const home = document.getElementById("home");
const logout = document.getElementById("logout");

analysis.addEventListener("click", () => {
  window.location.href = "../Fashion-Analysis/analysis.html";
});

style.addEventListener("click", () => {
  window.location.href = "../Fashion-Style/style.html";
});

trends.addEventListener("click", () => {
  window.location.href = "../Visual-Trends/trends.html";
});

home.addEventListener("click", () => {
  window.location.href = "../../home.html";
});

logout.addEventListener("click", () => {
  window.location.href = "../../Login/login.html";
});
