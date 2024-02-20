import "@babel/polyfill";

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = Array.prototype.forEach;
}

jQuery(function($) {
  $(document).ready(function() {
    const $elem = $('[data-sfcf]');

    if ($elem) {
      const $toggler = $elem.find('[data-sfcf-toggler]');
      const $close = $elem.find('[data-sfcf-close]');
      const $main = $elem.find('[data-sfcf-main]');

      $($toggler).on('click', function(e) {
        e.preventDefault();
        const $width = window.innerWidth;
        const $mobileBreakpoint = 993;

        if ($main.hasClass('-active')) {
          $main.removeClass('-active');
        }
        else {
          $main.addClass('-active');

          setTimeout(function() {
            $elem.find('input').first().focus();
          }, 455);
        }
      });

      $($close).on('click', function(e) {
        e.preventDefault();
        const $width = window.innerWidth;
        const $mobileBreakpoint = 993;

        if ($main.hasClass('-active')) {
          $main.removeClass('-active');
        }
      })

      const $form = $elem.find('[data-sfcf-form]');

      $form.on('submit', function(e) {
        e.preventDefault();

        const $formData = $form.serializeArray();
        const $formInputs = $form.find('input, textarea, checkbox');
        const $errorClass = '-error';
        let $hasErros = false;

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
          },
          beforeSend: function() {
            $(e.originalEvent.submitter).addClass('-submitted');
          }
        })

        .done(function($response) {
          if ($response['success']) {
            const $formStep = $form.parents('[data-sfcf-step="form"]');
            const $successStep = $elem.find('[data-sfcf-step="success"]');

            $formStep.addClass('-hidding');

            setTimeout(function() {
              $formStep.addClass('-hide');
              $formStep.removeClass('-hidding');
              $successStep.addClass('-show');
            }, 250);
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
      $form.on('focus', '.-error', function() {
        $(this).removeClass('-error');
      });
    }
  });
});
