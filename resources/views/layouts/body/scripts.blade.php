<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
<script src="{{ asset('assets/js/google-map.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/range.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  {{-- toast --}}
  <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    {{-- Sweetalert2 --}}
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>


<script>
      /*Funcion para agregar un item al carro*/
      function updateCart(id, qty) {
          /* Mostramos el gif de reload*/
          $('#gif_cart').show();
          /* Ocultamos los items*/
          $('#load_cart').hide();
          if (Number(qty) > 0) {
              var token = "{{ csrf_token() }}"
              $.ajax({
                  url: "{{ route('update_cart') }}",
                  type: 'get',
                  dataType: "JSON",
                  data: {
                      "id": id,
                      "qty": qty,
                      "_token": token,
                  },
                  success: function(data) {
                      var url = $(this).attr('href');
                      $.ajax({
                          url: url
                      }).done(function(data) {
                          /*Ocultamos el gif de reload*/
                          $('#gif_cart').hide();
                          /*Mostramos los items*/
                          $('#load_cart').show();
                          /* Se configura el contenido html*/
                          $('.section_cart').html(data);
                          window.history.pushState("", "", url);
                      }).fail(function(data) {
                          /*Ocultamos el gif de reload*/
                          $('#gif_cart').hide();
                          /*Mostramos los items*/
                          $('#load_cart').show();
                          toastr.error(data);

                      });
                      toastr.success(data.msg);

                  },
                  error: function(data) {
                      /*Ocultamos el gif de reload*/
                      $('#gif_cart').hide();
                      /*Mostramos los items*/
                      $('#load_cart').show();

                      if (data.msg != null) {
                          toastr.error(data.msg);
                      } else {
                          toastr.error(data);
                      }
                  }
              });
          }

      }

      /*Funcion para remover un item del carro*/
      function removeCart(id) {
          /* Mostramos el gif de reload*/
          $('#gif_cart').show();
          /* Ocultamos los items*/
          $('#load_cart').hide();
          var token = "{{ csrf_token() }}"
          $.ajax({
              url: "{{ route('remove_cart') }}",
              type: 'get',
              dataType: "JSON",
              data: {
                  "id": id,
                  "_token": token,
              },
              success: function(data) {
                  var url = $(this).attr('href');
                  $.ajax({
                      url: url
                  }).done(function(data) {
                      /*Ocultamos el gif de reload*/
                      $('#gif_cart').hide();
                      /*Mostramos los items*/
                      $('#load_cart').show();
                      /*Ocultamos el gif de reload*/
                      $('#gif_cart').hide();
                      /*Mostramos los items*/
                      $('#load_cart').show();
                      /* Se configura el contenido html*/
                      $('.section_cart').html(data);
                      window.history.pushState("", "", url);
                  }).fail(function(data) {
                      /*Ocultamos el gif de reload*/
                      $('#gif_cart').hide();
                      /*Mostramos los items*/
                      $('#load_cart').show();
                      /*Ocultamos el gif de reload*/
                      $('#gif_cart').hide();
                      /*Mostramos los items*/
                      $('#load_cart').show();
                      toastr.error(data);

                  });
                  toastr.success(data.msg);

              },
              error: function(data) {
                  /*Ocultamos el gif de reload*/
                  $('#gif_cart').hide();
                  /*Mostramos los items*/
                  $('#load_cart').show();
                  /*Ocultamos el gif de reload*/
                  $('#gif_cart').hide();
                  /*Mostramos los items*/
                  $('#load_cart').show();

                  if (data.msg != null) {
                      toastr.error(data.msg);
                  } else {
                      toastr.error(data);
                  }
              }
          });
      }

      /* Paginado */
      $('body').on('click', '.pagination a', function(e) {
          /* Mostramos el gif de reload*/
          $('#gif_div').show();
          /* Ocultamos los items*/
          $('#load').hide();
          /*La acción predeterminada del evento no se activará*/
          e.preventDefault();
          /*Obtenemos el valor del atributo href del enlace de paginación en el que se hizo clic*/
          var url = $(this).attr('href');
          /*Función que simplemente envía una solicitud HTTP (Ajax) a esa URL*/
          /*En el controlador if ($request->ajax())  caera en esa condicion*/
          getItems(url);
          /* hay que mantener (mostrar) las URL de paginación en la barra de direcciones
          para que los usuarios puedan marcar o compartir los enlaces.*/
          window.history.pushState("", "", url);
      });

      function getItems(url) {
          $.ajax({
              url: url
          }).done(function(data) {
              /* Se configura el contenido html*/
              $('.section_elements').html(data);
              /*Ocultamos el gif de reload*/
              $('#gif_div').hide();
              /*Mostramos los items*/
              $('#load').show();
          }).fail(function() {
              /*Ocultamos el gif de reload*/
              $('#gif_div').hide();
              /*Mostramos los items*/
              $('#load').show();
          });
      }
</script>

{{-- Toasters Messages --}}
@if (Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
@endif
