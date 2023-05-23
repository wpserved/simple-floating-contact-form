import "@babel/polyfill";

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = Array.prototype.forEach;
}

jQuery(function($) {
  $(document).ready(function() {
    let $elem = $('#sfcf_contact_popup');

    if ($elem) {
      let $toggler = $elem.find('a[data-js="sfcf-toggler"]');
      let $close = $elem.find('a[data-js="sfcf-close"]');

      window.addEventListener('scroll', () => {
        document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
      });

      //Open form popup
      $($toggler).on('click', function(e) {
        e.preventDefault();
        const $width = window.innerWidth;
        const $mobileBreakpoint = 993;

        if ($elem.hasClass('visible')) {
          $elem.removeClass('visible');

          if ($width < $mobileBreakpoint) {
            const body = document.body;
            const scrollY = body.style.top;
            body.style.position = '';
            body.style.top = '';
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
          }
        }
        else {
          $elem.addClass('visible');

          setTimeout(function() {
            $elem.find('input').first().focus();
          }, 455);

          if ($width < $mobileBreakpoint) {
            const scrollY  = document.documentElement.style.getPropertyValue('--scroll-y');
            const body = document.body;
            body.style.position = 'fixed';
            body.style.top = `-${scrollY}`;
          }
        }
      });

      // Close form popup
      $($close).on('click', function(e) {
        e.preventDefault();
        const $width = window.innerWidth;
        const $mobileBreakpoint = 993;

        if ($elem.hasClass('visible')) {
          $elem.removeClass('visible');

          if ($width < $mobileBreakpoint) {
            const body = document.body;
            const scrollY = body.style.top;
            body.style.position = '';
            body.style.top = '';
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
          }
        }
      })

      // Form submit
      var $form = $elem.find('form');

      $form.on('submit', function(e) {
        e.preventDefault();

        const $formData = $form.serializeArray();
        const $formInputs = $form.find('input, textarea, checkbox');
        const $errorClass = 'sfcf_error';
        var $hasErros = false;

        [...$formInputs].map((elem) => {
          let val = $(elem).val();
          let type = elem.getAttribute('type');

          if ($elem.hasClass($errorClass)) {
            $(elem).removeClass($errorClass);
          }

          if (elem.hasAttribute('data-required')) {
            if ("" === val) {
              $(elem).addClass($errorClass);
              $hasErros = true;
            }

            if ("checkbox"  === elem.type && false === elem.checked) {
              $(elem).addClass($errorClass);
              $hasErros = true;
            }
          }
        });

        if ($hasErros) {
          return;
        }

        $.ajax({
          method: 'POST',
          url: Ajax.url,
          data: {
            action: 'sfcf_send_form',
            page : window.location.href,
            inputs: $formData
          }
        })
        .done(function($response) {
          if ($response['success']) {
            var $formWrapper = $form.parents('#sfcf_form_wrapper');
            var $successClass = 'sfcf_sent';

            $formWrapper.addClass($successClass)
          } else {
            $.each($response['data'], function() {
              var $current = $(this);
              var $input = $elem.find('input[name='+$current[0]['code']+'], textarea[name='+$current[0]['code']+']');

              console.log($input);

              if ($input.length > 0) {
                $input.addClass(errorClass);
              }
            });
          }
        })
        .fail(function($errors) {
          console.log($errors);
        });
      });

      // remove error class on focus
      $form.on('focus', '.sfcf_error', function() {
        $(this).removeClass('sfcf_error');
      });
    }
  });
});

jQuery(function($) {
  $(document).ready(function() {
    const $elem = $('[data-sfcf]');

    if ($elem) {
      const $toggler = $elem.find('[data-sfcf-toggler]');
      const $close = $elem.find('[data-sfcf-close]');
      const $main = $elem.find('[data-sfcf-main]');

      window.addEventListener('scroll', () => {
        document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
      });

      //Open form popup
      $($toggler).on('click', function(e) {
        e.preventDefault();
        const $width = window.innerWidth;
        const $mobileBreakpoint = 993;

        if ($main.hasClass('-active')) {
          $main.removeClass('-active');

          // if ($width < $mobileBreakpoint) {
          //   const body = document.body;
          //   const scrollY = body.style.top;
          //   body.style.position = '';
          //   body.style.top = '';
          //   window.scrollTo(0, parseInt(scrollY || '0') * -1);
          // }
        }
        else {
          $main.addClass('-active');

          setTimeout(function() {
            $elem.find('input').first().focus();
          }, 455);

          // if ($width < $mobileBreakpoint) {
          //   const scrollY  = document.documentElement.style.getPropertyValue('--scroll-y');
          //   const body = document.body;
          //   body.style.position = 'fixed';
          //   body.style.top = `-${scrollY}`;
          // }
        }
      });

      // Close form popup
      $($close).on('click', function(e) {
        e.preventDefault();
        const $width = window.innerWidth;
        const $mobileBreakpoint = 993;

        if ($main.hasClass('-active')) {
          $main.removeClass('-active');

          // if ($width < $mobileBreakpoint) {
          //   const body = document.body;
          //   const scrollY = body.style.top;
          //   body.style.position = '';
          //   body.style.top = '';
          //   window.scrollTo(0, parseInt(scrollY || '0') * -1);
          // }
        }
      })

      // Form submit
      const $form = $elem.find('[data-sfcf-form]');

      $form.on('submit', function(e) {
        e.preventDefault();

        const $formData = $form.serializeArray();
        const $formInputs = $form.find('input, textarea, checkbox');
        const $errorClass = '-error';
        const $hasErros = false;

        [...$formInputs].map((elem) => {
          const val = $(elem).val();

          if ($elem.hasClass($errorClass)) {
            $(elem).removeClass($errorClass);
          }

          if (elem.hasAttribute('data-required')) {
            if ("" === val) {
              $(elem).addClass($errorClass);
              $hasErros = true;
            }

            if ("checkbox" === elem.type && false === elem.checked) {
              $(elem).addClass($errorClass);
              $hasErros = true;
            }
          }
        });

        if ($hasErros) {
          return;
        }

        $.ajax({
          method: 'POST',
          url: Ajax.url,
          data: {
            action: 'sfcf_send_form',
            page : window.location.href,
            inputs: $formData
          }
        })
        .done(function($response) {
          if ($response['success']) {
            const $formStep = $form.parents('[data-sfcf-step="form"]');
            const $successStep = $form.parents('[data-sfcf-step="success"]');

            $formStep.addClass('-hide');
            $successStep.addClass('-show');
          } else {
            $.each($response['data'], function() {
              const $current = $(this);
              const $input = $elem.find('input[name='+$current[0]['code']+'], textarea[name='+$current[0]['code']+']');

              if ($input.length > 0) {
                $input.addClass($errorClass);
              }
            });
          }
        })
        .fail(function($errors) {
          console.log($errors);
        });
      });

      // remove error class on focus
      $form.on('focus', '.sfcf_error', function() {
        $(this).removeClass('sfcf_error');
      });
    }
  });
});
