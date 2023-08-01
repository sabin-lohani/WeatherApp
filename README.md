# Sabin's Weather App

## Description

This is a weather app created as part of the assessment for the "Internet Software Architecture" module taught by Mr. Yamu Poudel during the second semester of Level 4. The app allows users to search for weather information for different cities around the world.

## Files

The following files are included in the project:

1. `index.html`: The main HTML file that defines the structure of the weather app.

2. `style.css`: The CSS file containing the styles and layout for the weather app.

3. `_script.js`: The JavaScript file responsible for fetching weather data from an API, displaying it on the web page, and handling user interactions.

4. `_mysqltojson.php`: PHP script that retrieves weather data from a MySQL database and converts it to JSON format.

5. `_apitomysql.php`: PHP script that updates weather data in the MySQL database based on data fetched from an external API.

6. `database.sql`: SQL script containing the database schema and initial data.

## Functionality

The weather app allows users to search for weather information for a specific city. When a city name is entered in the search input and the search button is pressed, the app fetches the weather data from the database (if available) or an external API (if not available in the database). The retrieved weather information is then displayed on the web page, including details such as temperature, weather condition, pressure, humidity, wind speed, wind direction, and an icon representing the weather condition.

The app also implements a caching mechanism to reduce API requests. If weather data for a specific city has been fetched within the last 5 minutes, the app retrieves the data from the browser's local storage instead of making a new API request.

## Usage

To use the weather app, simply open the `index.html` file in a web browser. The app will automatically fetch weather information for a default city (e.g., "Chickasaw") on page load. To search for weather information for a different city, enter the city name in the search input and press Enter or click the search button.

Please note that the app requires an internet connection to fetch weather data from the API.

## Credits

This weather app was developed by Sabin Lohani as part of the assessment for the "Internet Software Architecture" module. The weather data is sourced from https://openweathermap.org/ and stored in a MySQL database.

For any questions or inquiries, please contact sabinlohani@yahoo.com.
