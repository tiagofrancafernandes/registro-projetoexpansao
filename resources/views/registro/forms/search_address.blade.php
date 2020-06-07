
<script>    
$(document).ready(function (){

var api_url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/';    

var api_filter = '.json?access_token=pk.eyJ1IjoiYXBleHNlYXJjaHVzZXIiLCJhIjoiY2pxc2V6bjVyMHVxcjQ4cXE4cmg1a242diJ9.TMZ9oWhH_fF4ccYkaMeyAw&cachebuster=1591512541294&autocomplete=true&types=country%2Cregion%2Cdistrict%2Cpostcode%2Clocality%2Cneighborhood%2Cplace&language=pt&country=br&limit=5'

    /**
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
    /**/


    $.ajaxSetup({ cache: true });
    var count_allocated_in_string = $('#allocated_in_string').val().length;
    $('#allocated_in_string').keyup(function ()
    {
        if(window.count_allocated_in_string != $('#allocated_in_string').val().length)
        {
            var search_value = $(this).val();
            if (search_value.length < 4) {
                return false;
            }
            $('#result_cities').html('');
            $('#state').val('');
            var searchField = $('#allocated_in_string').val();
            var expression = new RegExp(searchField, "i");
            $.getJSON(api_url+ $('#allocated_in_string').val()+api_filter, function (data) {
                $('#result_cities').html('');
                $('#result_cities').append('<span class="list-group-item link-class" id="close_result_cities">Fechar [x]</span>')
                $.each(data.features, function (key, value)
                {
                    var longitude       = value.center[0];
                    var latitude        = value.center[1];
                    var place_name      = value.place_name_pt;
                    var text_pt         = value.text_pt;
                    var data_context    = JSON.stringify(value.context);
                    var content = `<li class="list-group-item link-class" place_name="${place_name}" text_pt="${text_pt}" longitude="${longitude}" latitude="${latitude}" data_context='${data_context}'>
                        ${place_name} | <span class="text-muted"> Longitude: ${longitude}</span> | <span class="text-muted">Latitude ${latitude}</span>
                        </li>`;
                    $('#result_cities').append(content);
                });
            });

            window.count_allocated_in_string = $('#allocated_in_string').val().length;
        }
    });

    $('#result_cities').on('click', 'li', function () {
        var longitude    = $(this).attr('longitude');
        var latitude     = $(this).attr('latitude');
        var place_name   = $(this).attr('place_name');
        var city_text_pt = $(this).attr('text_pt');
        var data_context = JSON.parse($(this).attr('data_context'));
        $('#allocated_city').val(city_text_pt);
        $('#allocated_state').val(data_context[0].short_code);
        $('#allocated_country').val(data_context[1].text_pt);

        $('#allocated_in_string').val(`${place_name} | Longitude: ${longitude} Latitude ${latitude}`);
        $('#allocated_in_string').val(place_name);
        $('#longitude').val(longitude);
        $('#latitude').val(latitude);
        $('#result_cities').html('');
    });

    $('#result_cities').on('click', 'span#close_result_cities', function () {
    $('#result_cities').html('');
    });

});
    
    
</script>