<div class="h-100 row align-items-center shadow">
    <div class="col-lg-12 col-md-12 col-sm-12 container justify-content-center">

        <h1 class="bd-lead justify-content-center mt-3 mb-3">{{ $_title }}</h1>
        <p class="bd-lead">Os dados aqui informados NÃO serão divulgados. Eles servem apenas para mapeamento e para estatísticas.</p>

        @php
          $action_route = ($is_edit) ? route('my_account.missionary_update') : route('my_account.missionary_store');
         // dd($missionary->phone_1);
        @endphp

        <form class="tf-form needs-validation mt-3 p-3 row" novalidate method="POST" 
          action="{{ $action_route }}">

            {{ csrf_field() }}

            @if($is_edit)
            <div class="card col-lg-12 card-body mb-3 case_is_edit _hide">
                <div class="row case_is_edit">
                    <!-- m_id -->
                    <div class="form-group col-lg-12 case_is_edit">
                        <label for="m_id">m_id</label>
                        <input type="text" class="form-control case_is_edit" name="m_id" id="m_id" placeholder="m_id" value="{{ $missionary->id }}" readonly>
                    </div>
                </div>
            </div>
            @endif

            <div class="card col-lg-12 card-body mb-3">
                <div class="row">

                    <!-- name -->
                    <div class="form-group col-lg-6">
                        <label for="name">Nome completo <sub class="tf-asterisk-required">*</sub></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex:  João Fernandes" 
                          value="{{ ($is_edit) ? $missionary->name: '' }}" required>
                        <div class="valid-feedback">
                          Ok
                        </div>
                        <div class="invalid-tooltip">
                          Favor informar um nome
                        </div>
                    </div>

                    <!-- alter_name -->
                    <div class="form-group col-lg-6">
                        <label for="alter_name">Nome alternativo (opcional)</label>
                        <input type="text" class="form-control" id="alter_name" name="alter_name" placeholder="Ex: Pr João Fernandes"
                          value="{{ ($is_edit) ? $missionary->alter_name: '' }}">
                    </div>
                
                    <!-- email_1 -->
                    <div class="form-group col-lg-6">
                        <label for="email_1">E-mail principal <sub class="tf-asterisk-required">*</sub></label>
                        <input type="email" class="form-control" id="email_1" name="email_1" placeholder="E-mail principal" 
                        value="{{ ($is_edit) ? $missionary->email_1: '' }}" required>
                        <div class="valid-feedback">
                          Ok
                        </div>
                        <div class="invalid-tooltip">
                          Favor informar um e-mail
                        </div>
                    </div>
                
                    <!-- email_2 -->
                    <div class="form-group col-lg-6">
                        <label for="email_2">E-mail secundário (opcional)</label>
                        <input type="email" class="form-control" id="email_2" name="email_2" placeholder="E-mail secundário"
                        value="{{ ($is_edit) ? $missionary->email_2: '' }}">
                    </div>
                </div>
            </div>

            <!-- phone_1 -->
            <div class="card col-lg-12 card-body mb-3">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="phone_1">Telefone principal <sub class="tf-asterisk-required">*</sub></label>
                        <input type="text" class="form-control" id="phone_1_number" name="phone_1[number]" placeholder="Telefone principal" 
                          value="{{ ($is_edit && isset($missionary->phone_1['number']))? $missionary->phone_1['number'] : '' }}" required>
                        <div class="valid-feedback">
                          Ok
                        </div>
                        <div class="invalid-tooltip">
                          Favor informar um telefone
                        </div>
                    </div>

                    <div class="col-lg-6 row">
                        <div class="col-lg-3 form-check form-check-inline mt-3 p-1 pl-3">
                          <input class="form-check-input tf-cursor-pointer tf-text-f-green" 
                           type="checkbox" id="phone_1_wa" name="phone_1[socials][wa]" value="1"
                           {{ (isset($missionary->phone_1['socials']['wa']) && $missionary->phone_1['socials']['wa'] == 1)? 'checked' :'' }} >
                          <label class="form-check-label tf-font-bold tf-cursor-pointer tf-text-f-green" for="phone_1_wa">WhatsApp</label>
                        </div>
        
                        <div class="col-lg-3 form-check form-check-inline mt-3 p-1 pl-3">
                          <input class="form-check-input tf-cursor-pointer tf-text-f-blue" 
                           type="checkbox" id="phone_1_telegram" name="phone_1[socials][telegram]" value="1"
                           {{ (isset($missionary->phone_1['socials']['telegram']) && $missionary->phone_1['socials']['telegram'] == 1)? 'checked' :'' }} >
                          <label class="form-check-label tf-font-bold tf-cursor-pointer tf-text-f-blue" for="phone_1_telegram">Telegram</label>
                        </div>
                    </div>                    
                </div>

                <hr>

                <!-- phone_2 -->
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="phone_2">Telefone secundário (opcional)</label>
                        <input type="text" class="form-control" id="phone_2_number" name="phone_2[number]" placeholder="Telefone secundário"
                        value="{{ ($is_edit && isset($missionary->phone_2['number']))? $missionary->phone_2['number'] :'' }}" >
                    </div>
                    
                    <div class="col-lg-6 row">
                        <div class="col-lg-3 form-check form-check-inline mt-3 p-1 pl-3">
                          <input class="form-check-input tf-cursor-pointer tf-text-f-green" 
                           type="checkbox" id="phone_2_wa" name="phone_2[socials][wa]" value="1"
                           {{ (isset($missionary->phone_2['socials']['wa']) && $missionary->phone_2['socials']['wa'] == 1)? 'checked' :'' }} >
                          <label class="form-check-label tf-font-bold tf-cursor-pointer tf-text-f-green" for="phone_2_wa">WhatsApp</label>
                        </div>
        
                        <div class="col-lg-3 form-check form-check-inline mt-3 p-1 pl-3">
                          <input class="form-check-input tf-cursor-pointer tf-text-f-blue" 
                           type="checkbox" id="phone_2_telegram" name="phone_2[socials][telegram]" value="1"
                           {{ (isset($missionary->phone_2['socials']['telegram']) && $missionary->phone_2['socials']['telegram'] == 1)? 'checked' :'' }} >
                          <label class="form-check-label tf-font-bold tf-cursor-pointer tf-text-f-blue" for="phone_2_telegram">Telegram</label>
                        </div>
                    </div>                    
                </div>
            </div>

            <!-- note -->
            <div class="card col-lg-12 card-body mb-3">
                <div class="row">
                  <div class="form-group col-lg-12">
                    <label for="note">Nota adicional (opcional)</label>
                    <textarea class="form-control" id="note" name="note" placeholder="Nota adicional" rows="3">{{ ($is_edit) ? $missionary->note: '' }}</textarea>
                  </div>
                </div>
            </div>

            
            <div class="card col-lg-12 card-body mb-3">
                <h5>Local de Ação</h5>
                <div class="row">
                    <div class="form-group col-lg-12">
                      <div class="form-row">
                        

                        <!-- allocated_in_string -->
                        <div class="form-group col-lg-12">
                          <label for="allocated_in_string">Endereço por extenso <sub class="tf-asterisk-required">*</sub></label>
                          <input type="text" class="form-control" id="allocated_in_string" name="allocated_in" placeholder="Alocado em" 
                          value="{{ ($is_edit) ? $missionary->allocated_in: '' }}" required>
                          <ul class="list-group" id="result_cities"></ul>

                          <div class="valid-feedback">
                            Ok
                          </div>
                          <div class="invalid-tooltip">
                            Favor informar um local válido
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="allocated_city">Cidade/Região <sub class="tf-asterisk-required">*</sub></label>
                          <input type="text" class="form-control" id="allocated_city" name="allocated_city" placeholder="Cidade" 
                            value="{{ ($is_edit) ? $missionary->allocated_city: '' }}" required="">
                          <div class="invalid-tooltip">
                            Por favor informe uma cidade ou região.
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="allocated_country">País <sub class="tf-asterisk-required">*</sub></label>
                          <select class="custom-select" id="allocated_country" name="allocated_country" required="">
                            <option selected="" value="">País...</option>
                            <option value="Brasil" {{ ($is_edit && $missionary->allocated_country == 'Brasil')? 'selected' : '' }}>Brasil</option>
                            {{--  <option value="Afeganistão">Afeganistão</option>
                            <option value="África do Sul">África do Sul</option>
                            <option value="Albânia">Albânia</option>
                            <option value="Alemanha">Alemanha</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antilhas Holandesas">Antilhas Holandesas</option>
                            <option value="Antárctida">Antárctida</option>
                            <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Argélia">Argélia</option>
                            <option value="Armênia">Armênia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Arábia Saudita">Arábia Saudita</option>
                            <option value="Austrália">Austrália</option>
                            <option value="Áustria">Áustria</option>
                            <option value="Azerbaijão">Azerbaijão</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrein">Bahrein</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belize">Belize</option>
                            <option value="Benim">Benim</option>
                            <option value="Bermudas">Bermudas</option>
                            <option value="Bielorrússia">Bielorrússia</option>
                            <option value="Bolívia">Bolívia</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgária">Bulgária</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Butão">Butão</option>
                            <option value="Bélgica">Bélgica</option>
                            <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                            <option value="Cabo Verde">Cabo Verde</option>
                            <option value="Camarões">Camarões</option>
                            <option value="Camboja">Camboja</option>
                            <option value="Canadá">Canadá</option>
                            <option value="Catar">Catar</option>
                            <option value="Cazaquistão">Cazaquistão</option>
                            <option value="Chade">Chade</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Chipre">Chipre</option>
                            <option value="Colômbia">Colômbia</option>
                            <option value="Comores">Comores</option>
                            <option value="Coreia do Norte">Coreia do Norte</option>
                            <option value="Coreia do Sul">Coreia do Sul</option>
                            <option value="Costa do Marfim">Costa do Marfim</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croácia">Croácia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Dinamarca">Dinamarca</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Egito">Egito</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                            <option value="Equador">Equador</option>
                            <option value="Eritreia">Eritreia</option>
                            <option value="Escócia">Escócia</option>
                            <option value="Eslováquia">Eslováquia</option>
                            <option value="Eslovênia">Eslovênia</option>
                            <option value="Espanha">Espanha</option>
                            <option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                            <option value="Estônia">Estônia</option>
                            <option value="Etiópia">Etiópia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Filipinas">Filipinas</option>
                            <option value="Finlândia">Finlândia</option>
                            <option value="França">França</option>
                            <option value="Gabão">Gabão</option>
                            <option value="Gana">Gana</option>
                            <option value="Geórgia">Geórgia</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Granada">Granada</option>
                            <option value="Gronelândia">Gronelândia</option>
                            <option value="Grécia">Grécia</option>
                            <option value="Guadalupe">Guadalupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesei">Guernesei</option>
                            <option value="Guiana">Guiana</option>
                            <option value="Guiana Francesa">Guiana Francesa</option>
                            <option value="Guiné">Guiné</option>
                            <option value="Guiné Equatorial">Guiné Equatorial</option>
                            <option value="Guiné-Bissau">Guiné-Bissau</option>
                            <option value="Gâmbia">Gâmbia</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungria">Hungria</option>
                            <option value="Ilha Bouvet">Ilha Bouvet</option>
                            <option value="Ilha de Man">Ilha de Man</option>
                            <option value="Ilha do Natal">Ilha do Natal</option>
                            <option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
                            <option value="Ilha Norfolk">Ilha Norfolk</option>
                            <option value="Ilhas Cayman">Ilhas Cayman</option>
                            <option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
                            <option value="Ilhas Cook">Ilhas Cook</option>
                            <option value="Ilhas Feroé">Ilhas Feroé</option>
                            <option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
                            <option value="Ilhas Malvinas">Ilhas Malvinas</option>
                            <option value="Ilhas Marshall">Ilhas Marshall</option>
                            <option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
                            <option value="Ilhas Salomão">Ilhas Salomão</option>
                            <option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
                            <option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
                            <option value="Ilhas Åland">Ilhas Åland</option>
                            <option value="Indonésia">Indonésia</option>
                            <option value="Inglaterra">Inglaterra</option>
                            <option value="Índia">Índia</option>
                            <option value="Iraque">Iraque</option>
                            <option value="Irlanda do Norte">Irlanda do Norte</option>
                            <option value="Irlanda">Irlanda</option>
                            <option value="Irã">Irã</option>
                            <option value="Islândia">Islândia</option>
                            <option value="Israel">Israel</option>
                            <option value="Itália">Itália</option>
                            <option value="Iêmen">Iêmen</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japão">Japão</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordânia">Jordânia</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Laos">Laos</option>
                            <option value="Lesoto">Lesoto</option>
                            <option value="Letônia">Letônia</option>
                            <option value="Libéria">Libéria</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lituânia">Lituânia</option>
                            <option value="Luxemburgo">Luxemburgo</option>
                            <option value="Líbano">Líbano</option>
                            <option value="Líbia">Líbia</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedônia">Macedônia</option>
                            <option value="Madagáscar">Madagáscar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Maldivas">Maldivas</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Malásia">Malásia</option>
                            <option value="Marianas Setentrionais">Marianas Setentrionais</option>
                            <option value="Marrocos">Marrocos</option>
                            <option value="Martinica">Martinica</option>
                            <option value="Mauritânia">Mauritânia</option>
                            <option value="Maurícia">Maurícia</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Moldávia">Moldávia</option>
                            <option value="Mongólia">Mongólia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Moçambique">Moçambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="México">México</option>
                            <option value="Mônaco">Mônaco</option>
                            <option value="Namíbia">Namíbia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Nicarágua">Nicarágua</option>
                            <option value="Nigéria">Nigéria</option>
                            <option value="Niue">Niue</option>
                            <option value="Noruega">Noruega</option>
                            <option value="Nova Caledônia">Nova Caledônia</option>
                            <option value="Nova Zelândia">Nova Zelândia</option>
                            <option value="Níger">Níger</option>
                            <option value="Omã">Omã</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestina">Palestina</option>
                            <option value="Panamá">Panamá</option>
                            <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                            <option value="Paquistão">Paquistão</option>
                            <option value="Paraguai">Paraguai</option>
                            <option value="País de Gales">País de Gales</option>
                            <option value="Países Baixos">Países Baixos</option>
                            <option value="Peru">Peru</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Polinésia Francesa">Polinésia Francesa</option>
                            <option value="Polônia">Polônia</option>
                            <option value="Porto Rico">Porto Rico</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Quirguistão">Quirguistão</option>
                            <option value="Quênia">Quênia</option>
                            <option value="Reino Unido">Reino Unido</option>
                            <option value="República Centro-Africana">República Centro-Africana</option>
                            <option value="República Checa">República Checa</option>
                            <option value="República Democrática do Congo">República Democrática do Congo</option>
                            <option value="República do Congo">República do Congo</option>
                            <option value="República Dominicana">República Dominicana</option>
                            <option value="Reunião">Reunião</option>
                            <option value="Romênia">Romênia</option>
                            <option value="Ruanda">Ruanda</option>
                            <option value="Rússia">Rússia</option>
                            <option value="Saara Ocidental">Saara Ocidental</option>
                            <option value="Saint Martin">Saint Martin</option>
                            <option value="Saint-Barthélemy">Saint-Barthélemy</option>
                            <option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
                            <option value="Samoa Americana">Samoa Americana</option>
                            <option value="Samoa">Samoa</option>
                            <option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
                            <option value="Santa Lúcia">Santa Lúcia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serra Leoa">Serra Leoa</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Singapura">Singapura</option>
                            <option value="Somália">Somália</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Suazilândia">Suazilândia</option>
                            <option value="Sudão">Sudão</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Suécia">Suécia</option>
                            <option value="Suíça">Suíça</option>
                            <option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
                            <option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
                            <option value="São Marino">São Marino</option>
                            <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                            <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                            <option value="Sérvia">Sérvia</option>
                            <option value="Síria">Síria</option>
                            <option value="Tadjiquistão">Tadjiquistão</option>
                            <option value="Tailândia">Tailândia</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tanzânia">Tanzânia</option>
                            <option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
                            <option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
                            <option value="Timor-Leste">Timor-Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Toquelau">Toquelau</option>
                            <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                            <option value="Tunísia">Tunísia</option>
                            <option value="Turcas e Caicos">Turcas e Caicos</option>
                            <option value="Turquemenistão">Turquemenistão</option>
                            <option value="Turquia">Turquia</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Ucrânia">Ucrânia</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Uruguai">Uruguai</option>
                            <option value="Uzbequistão">Uzbequistão</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vaticano">Vaticano</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietname">Vietname</option>
                            <option value="Wallis e Futuna">Wallis e Futuna</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                            <option value="Zâmbia">Zâmbia</option>  --}}
                          </select>
                          <div class="invalid-tooltip">
                            Por favor selecione um país.
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="allocated_state">Estado <sub class="tf-asterisk-required">*</sub></label>
                          <select class="custom-select" id="allocated_state" name="allocated_state" required="">
                            <option selected="" value="">Estado...</option>
                            <option value="BR-AC" {{ ($is_edit && $missionary->allocated_state == 'BR-AC')? 'selected' : '' }}>Acre</option>
                            <option value="BR-AL" {{ ($is_edit && $missionary->allocated_state == 'BR-AL')? 'selected' : '' }}>Alagoas</option>
                            <option value="BR-AP" {{ ($is_edit && $missionary->allocated_state == 'BR-AP')? 'selected' : '' }}>Amapá</option>
                            <option value="BR-AM" {{ ($is_edit && $missionary->allocated_state == 'BR-AM')? 'selected' : '' }}>Amazonas</option>
                            <option value="BR-BA" {{ ($is_edit && $missionary->allocated_state == 'BR-BA')? 'selected' : '' }}>Bahia</option>
                            <option value="BR-CE" {{ ($is_edit && $missionary->allocated_state == 'BR-CE')? 'selected' : '' }}>Ceará</option>
                            <option value="BR-DF" {{ ($is_edit && $missionary->allocated_state == 'BR-DF')? 'selected' : '' }}>Distrito Federal</option>
                            <option value="BR-ES" {{ ($is_edit && $missionary->allocated_state == 'BR-ES')? 'selected' : '' }}>Espírito Santo</option>
                            <option value="BR-GO" {{ ($is_edit && $missionary->allocated_state == 'BR-GO')? 'selected' : '' }}>Goiás</option>
                            <option value="BR-MA" {{ ($is_edit && $missionary->allocated_state == 'BR-MA')? 'selected' : '' }}>Maranhão</option>
                            <option value="BR-MT" {{ ($is_edit && $missionary->allocated_state == 'BR-MT')? 'selected' : '' }}>Mato Grosso</option>
                            <option value="BR-MS" {{ ($is_edit && $missionary->allocated_state == 'BR-MS')? 'selected' : '' }}>Mato Grosso do Sul</option>
                            <option value="BR-MG" {{ ($is_edit && $missionary->allocated_state == 'BR-MG')? 'selected' : '' }}>Minas Gerais</option>
                            <option value="BR-PA" {{ ($is_edit && $missionary->allocated_state == 'BR-PA')? 'selected' : '' }}>Pará</option>
                            <option value="BR-PB" {{ ($is_edit && $missionary->allocated_state == 'BR-PB')? 'selected' : '' }}>Paraíba</option>
                            <option value="BR-PR" {{ ($is_edit && $missionary->allocated_state == 'BR-PR')? 'selected' : '' }}>Paraná</option>
                            <option value="BR-PE" {{ ($is_edit && $missionary->allocated_state == 'BR-PE')? 'selected' : '' }}>Pernambuco</option>
                            <option value="BR-PI" {{ ($is_edit && $missionary->allocated_state == 'BR-PI')? 'selected' : '' }}>Piauí</option>
                            <option value="BR-RJ" {{ ($is_edit && $missionary->allocated_state == 'BR-RJ')? 'selected' : '' }}>Rio de Janeiro</option>
                            <option value="BR-RN" {{ ($is_edit && $missionary->allocated_state == 'BR-RN')? 'selected' : '' }}>Rio Grande do Norte</option>
                            <option value="BR-RS" {{ ($is_edit && $missionary->allocated_state == 'BR-RS')? 'selected' : '' }}>Rio Grande do Sul</option>
                            <option value="BR-RO" {{ ($is_edit && $missionary->allocated_state == 'BR-RO')? 'selected' : '' }}>Rondônia</option>
                            <option value="BR-RR" {{ ($is_edit && $missionary->allocated_state == 'BR-RR')? 'selected' : '' }}>Roraima</option>
                            <option value="BR-SC" {{ ($is_edit && $missionary->allocated_state == 'BR-SC')? 'selected' : '' }}>Santa Catarina</option>
                            <option value="BR-SP" {{ ($is_edit && $missionary->allocated_state == 'BR-SP')? 'selected' : '' }}>São Paulo</option>
                            <option value="BR-SE" {{ ($is_edit && $missionary->allocated_state == 'BR-SE')? 'selected' : '' }}>Sergipe</option>
                            <option value="BR-TO" {{ ($is_edit && $missionary->allocated_state == 'BR-TO')? 'selected' : '' }}>Tocantins</option>
                            <option value="BR-EX" {{ ($is_edit && $missionary->allocated_state == 'BR-EX')? 'selected' : '' }}>Estrangeiro</option>
                          </select>
                          <div class="invalid-tooltip">
                            Por favor selecione um estado.
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="allocated_district">Bairro</label>
                          <input type="text" class="form-control" id="allocated_district" name="allocated_district" placeholder="Bairro"
                          value="{{ ($is_edit) ? $missionary->allocated_district: '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="latitude">Latitude</label>
                          <input type="text" class="form-control" id="latitude" name="allocated_lat" placeholder="Latitude"
                          value="{{ ($is_edit) ? $missionary->allocated_lat: '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="longitude">Longitude</label>
                          <input type="text" class="form-control" id="longitude" name="allocated_long" placeholder="Longitude"
                          value="{{ ($is_edit) ? $missionary->allocated_long: '' }}">
                        </div>
                      </div>

                      @include('registro/forms/search_address')

                    </div>

                    <div class="col-lg-12">
                        <h4>[Alterar depois]</h4>
                        <!-- 
                            Talvez usar aqui algo como
                            https://jsfiddle.net/TiagoFranca/h835vjbo/1/
                         -->
                        ​<picture>
                            <source srcset="{{ asset('/') }}registro/img/Brazil_Blank_Map.svg_" type="image/svg+xml">
                            <img src="{{ asset('/') }}registro/img/Brazil_Blank_Map.svg_" class="img-fluid img-thumbnail w-100" alt="...">
                        </picture>
                    </div>
                </div>
            </div>
        
            <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary">{{ ($is_edit)? 'Atualizar' : 'Cadastrar' }}</button>
            </div>
            
        </form>

          
        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
    </div>
</div>
