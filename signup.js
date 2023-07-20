const signUp = document.querySelector(".signUp").addEventListener("click", (e) => {
  e.preventDefault();
  postSignUpInput();
});
const postSignUpInput = () => {
  const regUserName = document.querySelector(".regUserName").value.trim();
const regEmail = document.querySelector(".regEmail").value.trim();
const regPhone = document.querySelector(".regPhone").value.trim();
const regConfirm = document.querySelector(".regConfirm").value.trim();
const regPass = document.querySelector(".regPass").value.trim();
if (!regUserName || !regEmail || !regPhone || !regConfirm || !regPass) {
  console.error();

  document.getElementById("errorDiv").classList.remove('d-none');
  document.getElementById("errorDiv").textContent = "Please fill in all required fields.";
  setTimeout(()=>{
    document.getElementById("errorDiv").classList.add('d-none');
  },3000)
  return;
}

}
