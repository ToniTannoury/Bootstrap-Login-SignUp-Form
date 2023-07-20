window.onload = function() {
  const storedData = localStorage.getItem('responseData');
  const parsedData = JSON.parse(storedData);

  const dataText = document.getElementById('dataText');

  for (let key in parsedData) {
    if (parsedData.hasOwnProperty(key)) {
      const userInfo = document.createElement('p');
      userInfo.textContent = `${key} : ${parsedData[key]}`;
      dataText.appendChild(userInfo);
    }
  }
};
