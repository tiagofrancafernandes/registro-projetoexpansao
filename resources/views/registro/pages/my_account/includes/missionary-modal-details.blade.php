<div class="modal fade" tabindex="-1" role="dialog" id="missionary_detail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="_detail_title">Titulo</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th scope="row">Nome</th>
                        <td id="_detail_name"></td>
                      </tr>

                      <tr>
                        <th scope="row">E-mail</th>
                        <td id="_detail_email"></td>
                      </tr>

                      <tr>
                        <th scope="row">Alocado em</th>
                        <td id="_detail_allocated"></td>
                      </tr>

                      <tr>
                        <th scope="row">Telefone</th>
                        <td id="_detail_phone">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item" id="phone_1">
                              <span class="num"></span>
                              <img src="{{ asset('icons8') }}/whatsapp.svg" class="whatsapp _hide icon8 icon8-2" alt="WhatsApp" title="WhatsApp">
                              <img src="{{ asset('icons8') }}/telegram.svg" class="telegram _hide icon8 icon8-2" alt="Telegram" title="Telegram">
                            </li>
                            <li class="list-group-item" id="phone_2">
                              <span class="num"></span>
                              <img src="{{ asset('icons8') }}/whatsapp.svg" class="whatsapp _hide icon8 icon8-2" alt="WhatsApp" title="WhatsApp">
                              <img src="{{ asset('icons8') }}/telegram.svg" class="telegram _hide icon8 icon8-2" alt="Telegram" title="Telegram">
                            </li>
                          </ul>

                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script>
  function isJson(str)
  {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
  }

  function resetMissionariesRows()
  {
    jQuery('#_detail_title').html('');
    jQuery('#_detail_name').html('');
    jQuery('#_detail_email').html('');
    jQuery('#_detail_allocated').html('');
    jQuery('#phone_1 img.whatsapp').addClass('_hide');
    jQuery('#phone_2 img.telegram').addClass('_hide');
  }

  function phoneFillData(phone, phone_id_name)
  {
    phone = ( isJson(phone)) ? JSON.parse(phone) : phone;

    var phone_id =  '#'+phone_id_name;

    if(phone.number)
    {
      jQuery(phone_id+' span.num').html(phone.number);
    }else
    {
      jQuery(phone_id+' span.num').html('');
    }

    if(phone.socials && phone.socials.wa && phone.socials.wa == 1)
    {
      jQuery(phone_id+' img.whatsapp').removeClass('_hide');
    }else{
      jQuery(phone_id+' img.whatsapp').addClass('_hide');
    }

    if(phone.socials && phone.socials.telegram && phone.socials.telegram == 1)
    {
      jQuery(phone_id+' img.telegram').removeClass('_hide');
    }else{
      jQuery(phone_id+' img.telegram').addClass('_hide');
    }
  }

  function fillMissionariesRows(data)
  {
    var id                 = (data.id) ? data.id : '';
    var allocated_city     = (data.allocated_city) ? data.allocated_city : '';
    var allocated_country  = (data.allocated_country) ? data.allocated_country : '';
    var allocated_district = (data.allocated_district) ? data.allocated_district : '';
    var allocated_in       = (data.allocated_in) ? data.allocated_in : '';
    var allocated_lat      = (data.allocated_lat) ? data.allocated_lat : '';
    var allocated_long     = (data.allocated_long) ? data.allocated_long : '';
    var allocated_state    = (data.allocated_state) ? data.allocated_state : '';
    var created_at         = (data.created_at) ? data.created_at : '';
    var created_by         = (data.created_by) ? data.created_by : '';
    var email_1            = (data.email_1) ? data.email_1 : '';
    var email_2            = (data.email_2) ? data.email_2 : '';
    var name               = (data.name) ? data.name : '';
    var note               = (data.note) ? data.note : '';
    var phone_1            = (data.phone_1) ? data.phone_1 : '';
    var phone_2            = (data.phone_2) ? data.phone_2 : '';

    /* Fill */
    jQuery('#_detail_title').html(name);
    jQuery('#_detail_name').html(name);
    jQuery('#_detail_email').html(email_1);
    jQuery('#_detail_allocated').html(allocated_in);
    phoneFillData(phone_1, 'phone_1');
    phoneFillData(phone_2, 'phone_2');
  }

$(document).ready(function(){
   //$('#missionary_detail').on('show.bs.modal', function()
   //{
   //});

   $('.open_modal.view.missionary_detail_modal').on('click', function(e){
    resetMissionariesRows();
     var data = JSON.parse($(this).attr('data-json'));
     fillMissionariesRows(data);
   });

   $('#missionary_detail').on('hide.bs.modal', function()
   {
       resetMissionariesRows();
       console.log('hide');
   });
});
</script>