window.onload = function() {
  const storedData = localStorage.getItem('responseData');
  const parsedData = JSON.parse(storedData);

  const dataText = document.getElementById('dataText');
  console.log(parsedData)
    if(parsedData.data){
      console.log(parsedData.data.username)
      dataText.textContent =`Welcome ${parsedData.data.username}`
    }else{
      for (let key in parsedData) {
        if (parsedData.hasOwnProperty(key)) {
          dataText.textContent =`Welcome ${parsedData.username}`
        }
      }
    }
};
