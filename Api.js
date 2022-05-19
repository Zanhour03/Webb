$.get( "https://api.openweathermap.org/data/2.5/weather?q=stockholm&units=metric&appid=f6979e3e9422add771c5cb17fcd5b017", function( data ) {
    //Hämtar temp minTemp maxTemp feelsLike Pressure och Humidity till Html så de synns i sidan
      let temp = Math.floor(data.main.temp)
      let mintTemp = Math.floor(data.main.temp_min)
      let maxTemp = Math.floor(data.main.temp_max)
      let feelsLike = Math.floor(data.main.feels_like)
      let Pressure = Math.floor(data.main.pressure)
      let Humidity = Math.floor(data.main.humidity)

      //hämtar iconen från sidan
      let Icon = "http://openweathermap.org/img/wn/" + data.weather[0].icon + ".png";


    //skickar temp minTemp maxTemp feelsLike Pressure och Humidity till Html så de synns i sidan.
      $("#Temp").html(temp)
      $("#minTemp").html(mintTemp)
      $("#maxTemp").html(maxTemp)
      $("#feelsLike").html(feelsLike)
      $("#pressure").html(Pressure)
      $("#humidity").html(Humidity)

      //skickar iconen till html så den syns i sidan
      $("#icon").attr('src', Icon);
      
      
  });

  