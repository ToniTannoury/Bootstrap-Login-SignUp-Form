window.onload = function() {
  console.log(11);

  const signIn = document.querySelector(".signIn").addEventListener("click", (e) => {
    e.preventDefault();
    postLoginInput();
  });

  const postLoginInput = () => {
    const email = document.querySelector(".email").value;
    const password = document.querySelector(".password").value;
    if(!email || !password){
      console.log(111)
      document.getElementById("errorDiv").classList.remove('d-none');
        document.getElementById("errorDiv").textContent = "Please fill the form";
        setTimeout(()=>{
          document.getElementById("errorDiv").classList.add('d-none');
        },3000)
      return
    }
    const loginInput = {
      email,
      password
    };

    const url = 'http://localhost/SignUpLogin/signin.php';
    const body = JSON.stringify(loginInput);

    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: body
    })
    .then(response => response.json())
    .then(data => {
      console.log(data)
    })
    .catch(error => {
      console.log(error);
    });
  };
}
