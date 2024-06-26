document.addEventListener('DOMContentLoaded', function() {
  const lights = document.querySelectorAll('.light');
  let intervalId;

  function turnOnLights() {
    let currentLightIndex = 0;
    intervalId = setInterval(() => {
      lights.forEach(light => light.style.opacity = '0');
      lights[currentLightIndex].style.opacity = '1';
      currentLightIndex = (currentLightIndex + 1) % lights.length;
    }, 3000);
  }

  function turnOffLights() {
    clearInterval(intervalId);
    lights.forEach(light => light.style.opacity = '0');
  }

  document.getElementById('onButton').addEventListener('click', turnOnLights);
  document.getElementById('offButton').addEventListener('click', turnOffLights);
});
