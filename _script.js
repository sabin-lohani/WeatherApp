// dom elements as variable
input = document.getElementById('inputSearch');
city = document.querySelector('#city-name');
date_day = document.querySelector('#day-date');
temp = document.querySelector('#temp');
condition = document.querySelector('#main-condition');
pressure = document.querySelector('#pressure');
humidity = document.querySelector('#humidity');
wind = document.querySelector('#wind');
wind_direction = document.querySelector('#wind-direction');
icon = document.querySelector('#condition-icon');

// make a date of passed timezone
function genDate(timezone){
    date = new Date();
    utc = date.getTime() + (date.getTimezoneOffset() * 60000);  // calculating utc date
    timezone *= 1000    // setting timezone in milliseconds
    zoneDate = (new Date(utc + (timezone))).toString(); // calculating zone's date time
    return `${zoneDate.slice(0, 15)}`;
}

function generateData(cityName = 'chickasaw'){  // default city will be 'chickasaw' as it is my assigned city
    cityName = cityName.charAt(0).toUpperCase() + (cityName.slice(1)).toLowerCase();    // capitalizing the passed cityname

    if(localStorage.city==cityName && localStorage.when != null && parseInt(localStorage.when) + 300000 > Date.now()){
        city.innerHTML = localStorage.city+', '+localStorage.country;
        date_day.innerHTML = genDate(localStorage.timezone);
        temp.innerHTML = localStorage.temp+ "&#8451;";
        condition.innerHTML = localStorage.condition;
        pressure.innerHTML = localStorage.pressure;
        humidity.innerHTML = localStorage.humidity;
        wind.innerHTML = localStorage.wind;
        wind_direction.innerHTML = localStorage.wind_direction;
        icon.src = `http://openweathermap.org/img/wn/${localStorage.icon+'.png'}`;
    }
    else {
        fetch('http://localhost/final/_mysqltojson.php?cityname='+ cityName).then(response => response.json()).then(data => {
            printData(data);
            // Save new data to browser, with new timestamp
            localStorage.city = data.city;
            localStorage.country = data.country;
            localStorage.timezone = data.timezone;
            localStorage.temp = data.temperature;
            localStorage.condition = data.weather_condition;
            localStorage.pressure = data.pressure;
            localStorage.humidity = data.humidity;
            localStorage.wind = data.wind_sp;
            localStorage.wind_direction = data.wind_deg;
            localStorage.icon = data.icon;
            localStorage.when = Date.now(); // milliseconds since January 1 1970
        })
    }
}

// updates the html page's data with fetched data
function printData(data){
    city.innerHTML = data.city+', '+data.country;
    date_day.innerHTML = genDate(data.timezone)
    // .toFixed(1) 
    temp.innerHTML = data.temperature+ "&#8451;";
    condition.innerHTML = data.weather_condition;
    pressure.innerHTML = data.pressure;
    humidity.innerHTML = data.humidity;
    wind.innerHTML = data.wind_sp;
    wind_direction.innerHTML = data.wind_deg;
    icon.src = `http://openweathermap.org/img/wn/${data.icon+'.png'}`;
}

generateData(); // fetch default city data when page loads/reloads

// trigger search button when pressed enter on input
input.addEventListener('keypress', function(event) {
    if(event.key === 'Enter'){
        event.preventDefault();
        document.getElementById('searchBtn').click();
    }
});