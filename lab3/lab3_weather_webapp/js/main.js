document.addEventListener('DOMContentLoaded', function() {
  // Weather API
  const weatherApiKey = '73acec2fef280c68330319c7109750ab';
  const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=Troy, New York&appid=${weatherApiKey}`;

  document.getElementById('getWeather').addEventListener('click', function() {
    fetch(weatherUrl)
      .then(response => response.json())
      .then(data => {
        displayWeather(data);
      })

      .catch(error => {
        console.error('Error fetching weather data:', error);
      });

  });

  function displayWeather(data) {
    document.getElementById('location').innerText = `Location: ${data.name}, ${data.sys.country}`;
    document.getElementById('temperature').innerText = `Temperature: ${Math.round(data.main.temp - 273.15)}°C`;
    document.getElementById('description').innerText = `Weather: ${data.weather[0].description}`;
    document.getElementById('humidity').innerText = `Humidity: ${data.main.humidity}%`;
    document.getElementById('windSpeed').innerText = `Wind Speed: ${data.wind.speed} m/s`;
    document.getElementById('weatherInfo').style.display = 'block';
  }

  // Google Translate API
  const translateApiKey = 'c2e7828003msh6616922b216c48dp14ad35jsnc5e155872be9';
  const translateUrl = 'https://google-translate1.p.rapidapi.com/language/translate/v2';

  document.getElementById('translateToLanguage').addEventListener('click', function() {
    const selectedLanguage = document.getElementById('languageSelect').value;
    const elementsToTranslate = ['temperature', 'description', 'humidity', 'windSpeed'];

    elementsToTranslate.forEach(id => {
      const textToTranslate = document.getElementById(id).innerText;
      const encodedParams = new URLSearchParams();
      encodedParams.set('q', textToTranslate);
      encodedParams.set('target', selectedLanguage);

      fetch(translateUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          'X-RapidAPI-Key': translateApiKey,
          'X-RapidAPI-Host': 'google-translate1.p.rapidapi.com'
        },
        body: encodedParams
      })

        .then(response => response.json())
        .then(data => {
          document.getElementById(id).innerText = data.data.translations[0].translatedText;
        })

        .catch(error => {
          console.error('Error translating text:', error);
        });

    });
  });
});
