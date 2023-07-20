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

if(regConfirm!==regPass){
  document.getElementById("errorDiv").classList.remove('d-none');
  document.getElementById("errorDiv").textContent = "Passwords do not match";
  setTimeout(()=>{
    document.getElementById("errorDiv").classList.add('d-none');
  },3000)
  return;
}
if (!regUserName || !regEmail || !regPhone || !regConfirm || !regPass) {
    console.error();

    document.getElementById("errorDiv").classList.remove('d-none');
    document.getElementById("errorDiv").textContent = "Please fill in all required fields.";
    setTimeout(()=>{
      document.getElementById("errorDiv").classList.add('d-none');
    },3000)
    return;
  }

  const signUpInput = {
    username: regUserName,
    password: regPass,
    phone: regPhone,
    email: regEmail,
  };

  console.log(signUpInput);
  const url = 'http://localhost/SignUpLogin/signup.php';
  const body = JSON.stringify(signUpInput);
  console.log(body)
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: body
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.status !== 'success'){
      document.getElementById("errorDiv").classList.remove('d-none');
      document.getElementById("errorDiv").textContent = data.error;
      setTimeout(()=>{
        document.getElementById("errorDiv").classList.add('d-none');
      },3000)
    }
    localStorage.setItem('responseData', JSON.stringify(data));
    window.location.href = 'dashboard.html';
  })
  .catch(error => {
    
    console.log(error);
  }); 
};

