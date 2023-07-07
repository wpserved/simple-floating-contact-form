export const preview = () => {
  setTimeout(() => {
    const root = document.documentElement;
    const sfcf = document.querySelector('[data-sfcf]');
    const colorsWrapper = document.querySelector('[data-color-inputs]');
    const radiusWrapper = document.querySelector('[data-radius-inputs]');
    const cornersOptions = document.querySelector('[data-corners]');

    if (! colorsWrapper) {
      return;
    }

    const colorItems = colorsWrapper.querySelectorAll('[data-color-input]');

    if (! colorItems) {
      return;
    }

    updatePreviewColor(root, colorItems);

    if (! radiusWrapper) {
      return;
    }

    const radiusItems = radiusWrapper.querySelectorAll('[data-radius-input]');

    if (! radiusItems) {
      return;
    }

    updateRadiusValue(root, radiusItems);

    if (! cornersOptions) {
      return;
    }

    const cornerInputs = cornersOptions.querySelectorAll('input');

    updateCornersStyle(sfcf, cornerInputs);
  }, 1000);
};

function updatePreviewColor(root, items) {
  items.forEach((item) => {
    const input = item.querySelector('.wp-color-picker');
    const picker = item.querySelector('.wp-color-result');

    if (input) {
      root.style.setProperty(`--${input.name}`, input.value);

      const options = {
        attributes: true
      }

      function callback(mutationList, observer) {
        mutationList.forEach(function(mutation) {
          const newValue = input.value;
          root.style.setProperty(`--${input.name}`, newValue);
        });
      }

      const observer = new MutationObserver(callback);
      observer.observe(picker, options);
    }
  });
}

function updateRadiusValue(root, items) {
  items.forEach((item) => {
    const input = item.querySelector('input');

    if (input) {
      input.oninput = function(e) {
        this.setAttribute('value', input.value)
      }

      root.style.setProperty(`--${input.name}-updated`, `${input.value}px`);

      const options = {
        attributes: true
      }

      function callback(mutationList, observer) {
        mutationList.forEach(function(mutation) {
          const newValue = input.value;
          root.style.setProperty(`--${input.name}-updated`, `${newValue}px`);
        });
      }

      const observer = new MutationObserver(callback);
      observer.observe(input, options);
    }
  });
}

function updateCornersStyle(main, items) {
  items.forEach((input) => {
    if (input.id == 'sfcf-corners-square-true' && input.checked) {
      main.style.setProperty('--sfcf-radius-toggler', 0 + 'px');
      main.style.setProperty('--sfcf-radius-big', 0 + 'px');
      main.style.setProperty('--sfcf-radius-medium', 0 + 'px');
      main.style.setProperty('--sfcf-radius-small', 0 + 'px');
    }

    input.addEventListener('change', () => {
      if (input.id == 'sfcf-corners-square-true' && input.value == 'true') {
        main.style.setProperty('--sfcf-radius-big', 0 + 'px');
        main.style.setProperty('--sfcf-radius-medium', 0 + 'px');
        main.style.setProperty('--sfcf-radius-small', 0 + 'px');


        document.querySelector('[data-sfcf-toggler]').style.borderRadius = '0px';
        document.querySelectorAll('.sfcf__form-field').forEach((field) => {
          field.style.borderRadius = '0px';
        });
      } else {
        main.style.setProperty('--sfcf-radius-big', 20 + 'px');
        main.style.setProperty('--sfcf-radius-medium', 16 + 'px');
        main.style.setProperty('--sfcf-radius-small', 6 + 'px');

        document.querySelector('[data-sfcf-toggler]').style.borderRadius = 'var(--sfcf-radius-toggler)';
        document.querySelectorAll('.sfcf__form-field').forEach((field) => {
          field.style.borderRadius = 'var(--sfcf-radius-input)';
        });
      }
    });
  });
}