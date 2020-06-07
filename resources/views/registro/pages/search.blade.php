<!DOCTYPE html>
<html>

<head>
    <title>Open Maps Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}search/search_address.css">
    <style>
        #result {
            position: absolute;
            width: 100%;
            max-width: 870px;
            cursor: pointer;
            overflow-y: auto;
            max-height: 400px;
            box-sizing: border-box;
            z-index: 1001;
        }

        .link-class:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <br /><br />
    <div class="container" style="width:900px;">
        <h2 align="center">JSON Live Data Search using Ajax JQuery</h2>

        <p>longitude: <strong id="longitude"></strong></p>
        <p>latitude: <strong id="latitude"></strong></p>


        <div class="fb-text form-group field-address_info_data">
            <label for="address_info_data" class="fb-text-label">address_info_data</label>
            <input type="text" class="form-control" name="address_info_data" id="address_city_description" value="Hospital Unimed Porto velho"  autocomplete="off" readonly>
        
            <input type="text" id="search_address" value="" placeholder="Informe sua cidade" class="form-control" autocomplete="off" required>
            <ul class="list-group" id="result_cities"></ul>
        </div>

    </div>

    <script>
    
/**
 *******************************************
 * Busca de cidades via ajax
 * Baseado no tutorial  https://www.youtube.com/watch?v=mZOpvhywT_E
 */

$(document).ready(function () {
//   var API_PMAIS = (typeof API_PMAIS !== 'undefined') ?API_PMAIS:'//api.pontomais.com.br';

var api_url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/';
//var api_filter = '.json?access_token=pk.eyJ1IjoiYXBleHNlYXJjaHVzZXIiLCJhIjoiY2pxc2V6bjVyMHVxcjQ4cXE4cmg1a242diJ9.TMZ9oWhH_fF4ccYkaMeyAw&cachebuster=1586730297401&autocomplete=true&country=br&types=country%2Cregion%2Cdistrict%2Cpostcode%2Clocality%2Cplace%2Cneighborhood%2Caddress%2Cpoi&language=pt&languageMode=strict&routing=true&limit=1'

var api_filter = '.json?access_token=pk.eyJ1IjoiYXBleHNlYXJjaHVzZXIiLCJhIjoiY2pxc2V6bjVyMHVxcjQ4cXE4cmg1a242diJ9.TMZ9oWhH_fF4ccYkaMeyAw&cachebuster=1591512541294&autocomplete=true&types=country%2Cregion%2Cdistrict%2Cpostcode%2Clocality%2Cplace%2Cneighborhood%2Caddress%2Cpoi&language=pt&limit=5'

  var search_value = $('#address_city_description').val();
  if (search_value.length > 0)
  {
      console.log('Carregando cidade pela descrição');
      $.ajaxSetup({ cache: true });
      $('#result_cities').html('');
      $('#state').val('');
      var searchField = search_value;
      var expression = new RegExp(searchField, "i");
      $.getJSON(api_url+ $('#address_city_description').val()+api_filter, function (data) {
          $('#result_cities').html('');
          $.each(data.features, function (key, value)
          {
            var to_search = value.place_name//.replace(/[^a-zA-Z ]/g, "");
            if (to_search.toString().search(expression) != -1)
            {
              var longitude = value.center[0];
              var latitude  = value.center[1];
              var place_name = value.place_name_pt;
              $('#address_city_description').val(`${place_name} | Longitude: ${longitude} Latitude ${latitude}`);
              $('#search_address').val(value.place_name_pt);
              $('#longitude').html(longitude);
              $('#latitude').html(latitude);
            }
          });

          if($('#search_address').val().length == 0) //Se não foi preenchido
          {
              if(data.features.length > 0)
              {
                var value = data.features[0];
                var longitude = value.center[0];
                var latitude  = value.center[1];
                var place_name = value.place_name_pt;
                $('#address_city_description').val(`${place_name} | Longitude: ${longitude} Latitude ${latitude}`);
                $('#search_address').val(value.place_name_pt);
                $('#longitude').html(longitude);
                $('#latitude').html(latitude);
              }
          }
      });
  }


  $.ajaxSetup({ cache: true });
  var count_search_address = $('#search_address').val().length;
  $('#search_address').keyup(function ()
  {
      if(window.count_search_address != $('#search_address').val().length)
      {
        var search_value = $(this).val();
        if (search_value.length < 4) {
            return false;
        }
        $('#result_cities').html('');
        $('#state').val('');
        var searchField = $('#search_address').val();
        var expression = new RegExp(searchField, "i");
        $.getJSON(api_url+ $('#search_address').val()+api_filter, function (data) {
            $('#result_cities').html('');
            $('#result_cities').append('<span class="list-group-item link-class" id="close_result_cities">Fechar [x]</span>')
            $.each(data.features, function (key, value) {
                var longitude  = value.center[0];
                var latitude   = value.center[1];
                var place_name = value.place_name_pt;
                var content = `<li class="list-group-item link-class" place_name="${place_name}" longitude="${longitude}" latitude="${latitude}">
                    ${place_name} | <span class="text-muted"> Longitude: ${longitude}</span> | <span class="text-muted">Latitude ${latitude}</span>
                    </li>`;
                $('#result_cities').append(content);
            });
        });

        window.count_search_address = $('#search_address').val().length;
      }
  });

  $('#result_cities').on('click', 'li', function () {
      var longitude = $(this).attr('longitude');
      var latitude  = $(this).attr('latitude');
      var place_name = $(this).attr('place_name');
      $('#address_city_description').val(`Longitude: ${longitude} Latitude ${latitude}`);
      $('#search_address').val(place_name);
      $('#longitude').html(longitude);
      $('#latitude').html(latitude);
      $('#result_cities').html('');
  });

  $('#result_cities').on('click', 'span#close_result_cities', function () {
    $('#result_cities').html('');
  });

});

/**
 *******************************************
 */


    </script>
{{--  <script src="{{ asset('/') }}search/search_address.js"></script>  --}}

</body>

</html>