<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IEEH | Simulador de acciones afirmativas</title>
  <link rel="icon" type="image/png" href="images/icons/IEEH.png">
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" href="css/institucional.css">
</head>
<body>
  <header class="site-header">
    <div class="header-content">
      <a class="brand" href="#inicio" aria-label="Instituto Estatal Electoral de Hidalgo">
        <span class="logo-frame"><img src="images/IEEH.png" alt="Logotipo IEEH" id="logoIEEH"></span>
        <span>Instituto Estatal Electoral de Hidalgo</span>
      </a>
     
    </div>
  </header>

  <main id="inicio">
    <section class="intro-band">
      <div class="content-width intro-grid">
        <div>
 <h4 class="beige">Herramienta de consulta</h4>
          <h1>Simulador para la Integración de Grupos de Atención Prioritaria</h1>
          <p class="intro-copy">Consulta la integración de planillas y las fórmulas a postular para cada municipio del estado de Hidalgo.</p>
        </div>
        
      </div>
    </section>

    <section class="content-width consultation" aria-labelledby="consulta-title">
      <div class="section-heading">
        
        <div>
          <h2 id="consulta-title">Seleccione el Municipio</h2>
          <p>Los resultados se actualizan automáticamente al elegir una opción.</p>
        </div>
        <div id="population-summary" class="population-summary" aria-live="polite">
          <p id="poblacion" class="population"></p>
        </div>
      </div>
      <div class="consultation-grid">
        <div class="municipality-control">
          <label for="municipio"><i data-lucide="map-pin" aria-hidden="true"></i>Municipio</label>
          <div class="municipality-select-wrap">
            <i class="select-location-icon" data-lucide="map-pinned" aria-hidden="true"></i>
            <select id="municipio" class="municipality-select">
          <option value="">Seleccione un municipio</option>
          <option value="1">Acatlán</option>
          <option value="2">Acaxochitlán</option>
          <option value="3">Actopan</option>
          <option value="4">Agua Blanca de Iturbide</option>
          <option value="5">Ajacuba</option>
          <option value="6">Alfajayucan</option>
          <option value="7">Almoloya</option>
          <option value="8">Apan</option>
          <option value="9">Atitalaquia</option>
          <option value="10">Atlapexco</option>
          <option value="12">Atotonilco el Grande</option>
          <option value="11">Atotonilco de Tula</option>
          <option value="13">Calnali</option>
          <option value="14">Cardonal</option>
          <option value="15">Chapantongo</option>
          <option value="16">Chapulhuacán</option>
          <option value="17">Chilcuautla</option>
          <option value="18">Cuautepec de Hinojosa</option>
          <option value="19">El Arenal</option>
          <option value="20">Eloxochitlán</option>
          <option value="21">Emiliano Zapata</option>
          <option value="22">Epazoyucan</option>
          <option value="23">Francisco I. Madero</option>
          <option value="24">Huasca de Ocampo</option>
          <option value="25">Huautla</option>
          <option value="26">Huazalingo</option>
          <option value="27">Huehuetla</option>
          <option value="28">Huejutla de Reyes</option>
          <option value="29">Huichapan</option>
          <option value="30">Ixmiquilpan</option>
          <option value="31">Jacala de Ledezma</option>
          <option value="32">Jaltocán</option>
          <option value="33">Juárez Hidalgo</option>
          <option value="34">La Misión</option>
          <option value="35">Lolotla</option>
          <option value="36">Metepec</option>
          <option value="37">Metztitlán</option>
          <option value="38">Mineral de la Reforma</option>
          <option value="39">Mineral del Chico</option>
          <option value="40">Mineral del Monte</option>
          <option value="41">Mixquiahuala de Juárez</option>
          <option value="42">Molango de Escamilla</option>
          <option value="43">Nicolás Flores</option>
          <option value="44">Nopala de Villagrán</option>
          <option value="45">Omitlán de Juárez</option>
          <option value="46">Pachuca de Soto</option>
          <option value="47">Pacula</option>
          <option value="48">Pisaflores</option>
          <option value="49">Progreso de Obregón</option>
          <option value="50">San Agustín Metzquititlán</option>
          <option value="51">San Agustín Tlaxiaca</option>
          <option value="52">San Bartolo Tutotepec</option>
          <option value="53">San Felipe Orizatlán</option>
          <option value="54">San Salvador</option>
          <option value="55">Santiago de Anaya</option>
          <option value="56">Santiago Tulantepec de Lugo Guerrero</option>
          <option value="57">Singuilucan</option>
          <option value="58">Tasquillo</option>
          <option value="59">Tecozautla</option>
          <option value="60">Tenango de Doria</option>
          <option value="61">Tepeapulco</option>
          <option value="62">Tepehuacán de Guerrero</option>
          <option value="63">Tepeji del Río de Ocampo</option>
          <option value="64">Tepetitlán</option>
          <option value="65">Tetepango</option>
          <option value="66">Tezontepec de Aldama</option>
          <option value="67">Tianguistengo</option>
          <option value="68">Tizayuca</option>
          <option value="69">Tlahuelilpan</option>
          <option value="70">Tlahuiltepa</option>
          <option value="71">Tlanalapa</option>
          <option value="72">Tlanchinol</option>
          <option value="73">Tlaxcoapan</option>
          <option value="74">Tolcayuca</option>
          <option value="75">Tula de Allende</option>
          <option value="76">Tulancingo de Bravo</option>
          <option value="77">Villa de Tezontepec</option>
          <option value="78">Xochiatipan</option>
          <option value="79">Xochicoatlán</option>
          <option value="80">Yahualica</option>
          <option value="81">Zacualtipán de Ángeles</option>
          <option value="82">Zapotlán de Juárez</option>
          <option value="83">Zempoala</option>
          <option value="84">Zimapán</option>
            </select>
          </div>
          
        </div>
        <div class="map-wrap">
          <?php include __DIR__ . '/images/mapa-hidalgo.svg'; ?>
        </div>
      </div>
    </section>

    <section id="results" class="content-width results" aria-live="polite">
      <div class="result-summary">
        <div>
          
          <h2>Resultados de la consulta</h2>
        </div>
        <p id="tipo" class="municipality-type"></p>
      </div>


      <div class="result-section">
        <div class="result-section-title"><h3>Integrantes de la planilla</h3><span>Composición total</span></div>
        <div class="data-grid planilla-grid">
          <article class="data-item"><span><i data-lucide="user-round" aria-hidden="true"></i><span id="pres">Presidenta(o)</span></span><strong id="president">-</strong></article>
          <article class="data-item"><span><i data-lucide="badge-check" aria-hidden="true"></i><span>Síndica(o)</span></span><strong id="sindic">-</strong></article>
          <article class="data-item"><span><i data-lucide="users-round" aria-hidden="true"></i><span>Regidoras(es)</span></span><strong id="regido">-</strong></article>
          <article class="data-item total-item"><span><i data-lucide="users" aria-hidden="true"></i><span>Total</span></span><strong id="total">-</strong></article>
        </div>
      </div>

      <div class="result-section">
        <div class="result-section-title"><h3>Número de fórmulas a postular</h3><span>Acciones afirmativas</span></div>
        <div class="data-grid formulas-grid">
          <article class="data-item"><span><i data-lucide="accessibility" aria-hidden="true"></i><span>Personas con discapacidad</span></span><strong id="persDisc">-</strong></article>
          <article class="data-item"><span><i data-lucide="person-standing" aria-hidden="true"></i><span>Personas ciudadanas jóvenes <small>Primeros 4 lugares</small></span></span><strong id="persMenor">-</strong></article>
          <article class="data-item"><span><i data-lucide="rainbow" aria-hidden="true"></i><span>Personas de diversidad sexual y de género</span></span><strong id="persLGBT">-</strong></article>
          <article class="data-item"><span><i data-lucide="globe-2" aria-hidden="true"></i><span>Personas con adscripción indígena</span></span><strong id="persIndi">-</strong></article>
        </div>
        <p id="presidencia" class="presidency-note"></p>
      </div>
    </section>
  </main>

  <footer class="site-footer"><div class="content-width"><span>Instituto Estatal Electoral de Hidalgo</span><span>Simulador de grupos de atención prioritaria</span></div></footer>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    $(function () {
      $('#municipio').select2({ minimumResultsForSearch: 12, width: '100%' });
      $('#results').hide();
      $('#population-summary').hide();

      $('#mapaHidalgo .municipio[data-name="Pacula"]').attr('data-id', '47');
      $('#mapaHidalgo .municipio[data-name="Pachuca de Soto"]').attr('data-id', '46');

      $('#municipio').on('change', function () {
        if (!this.value) {
          $('#results').hide();
          $('#population-summary').hide().find('#poblacion').empty();
          return;
        }

        var municipioId = this.value;
        var ajaxUrl = (function () {
          var path = window.location.pathname || '/';
          path = path.replace(/\/index\.php$/i, '');
          path = path.replace(/\/+$/, '');
          return path ? path + '/comprobar.php' : '/comprobar.php';
        })();

        $.post(ajaxUrl, { municipio: municipioId }).done(function (data) {
          var info = JSON.parse(data);
          if (info.poblacion_municipio) {
            // Dato en vivo desde la API de Indicadores del INEGI.
            var html = '<span class="population-entry"><i data-lucide="map-pin" aria-hidden="true"></i><span>Población actual del municipio <small>(INEGI)</small><strong>' + Number(info.poblacion_municipio).toLocaleString('es-MX') + ' personas</strong></span></span>';
            if (info.poblacion_estado) {
              html += '<span class="population-entry"><i data-lucide="map" aria-hidden="true"></i><span>Población actual de Hidalgo <small>(INEGI)</small><strong>' + Number(info.poblacion_estado).toLocaleString('es-MX') + ' personas</strong></span></span>';
            }
            $('#poblacion').html(html);
          } else {
            $('#poblacion').html('<span class="population-entry"><i data-lucide="map-pin" aria-hidden="true"></i><span>Población actual <small>(INEGI 2020)</small><strong>' + info.poblacion + ' personas</strong></span></span>');
          }
          lucide.createIcons();
          $('#population-summary').stop(true, true).fadeIn(180);
          var isWomenOnly = info.exclusivoMujeres === 'EM';
          $('#tipo').text('Municipio ' + info.tipo + (isWomenOnly ? ' | Exclusivo mujeres' : ''));
          $('#pres').text(isWomenOnly ? 'Presidenta' : 'Presidenta(o)');
          $('#president').text(info.presidente); $('#sindic').text(info.sindicos); $('#regido').text(info.regidores); $('#total').text(info.totalPlanilla);
          $('#persDisc').text(info.personas_discapacidad); $('#persMenor').text(info.personas_jovenes);
          $('#persLGBT').text(info.diversidad_sexual === 'Disponible' ? 'Disponible para registrar' : 'Sin espacio para contabilizar').toggleClass('unavailable', info.diversidad_sexual !== 'Disponible');
          $('#persIndi').text(info.adscripcion_indigena === 'Disponible' ? 'Disponible para registrar' : 'Sin obligación para registrar').toggleClass('indigenous', info.adscripcion_indigena === 'Disponible');
          $('#presidencia').text(info.tipo === 'Indígena' ? 'Planilla encabezada por ' + (isWomenOnly ? 'mujer indígena' : 'persona indígena') : '').toggle(info.tipo === 'Indígena');
          $('#mapaHidalgo .municipio').removeClass('active');
          $('#mapaHidalgo .municipio[data-id="' + municipioId + '"]').addClass('active').appendTo('#mapaHidalgo');
          $('#results').stop(true, true).fadeIn(180);
        }).fail(function () { alert('No fue posible consultar la información. Verifique que la aplicación se ejecute desde un servidor PHP.'); });
      });

      // Permite seleccionar el municipio haciendo clic directamente en el mapa
      $('#mapaHidalgo').on('click', '.municipio', function () {
        $('#municipio').val($(this).data('id')).trigger('change');
      });
    });
  </script>

  <!-- From Uiverse.io by andrew-demchenk0 --> 
<label class="switch">
  <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#ffd43b"><circle r="5" cy="12" cx="12"></circle><path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path></g></svg></span>
  <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path></svg></span>   
  <input type="checkbox" class="input" id="darkModeToggle">
  <span class="slider"></span>
</label>

  <script>
    // Aplica y recuerda la preferencia de modo oscuro en localStorage
    (function () {
      var toggle = document.getElementById('darkModeToggle');
      var saved = localStorage.getItem('theme');
      if (saved === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        toggle.checked = true;
      }
      toggle.addEventListener('change', function () {
        if (toggle.checked) {
          document.documentElement.setAttribute('data-theme', 'dark');
          localStorage.setItem('theme', 'dark');
        } else {
          document.documentElement.removeAttribute('data-theme');
          localStorage.setItem('theme', 'light');
        }
      });
    })();
  </script>
  <script>
    lucide.createIcons();
  </script>
</body>
</html>