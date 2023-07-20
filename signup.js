window.onload = function() {
  console.log(11);

  const signIn = document.querySelector(".signIn").addEventListener("click", (e) => {
    e.preventDefault();
    postLoginInput();
  });

  const postLoginInput = () => {
    const email = document.querySelector(".email").value;
    const password = document.querySelector(".password").value;

  }
}