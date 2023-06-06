export const preview = () => {
  setTimeout(() => {
    const wrapper = document.querySelector('[data-color-inputs]');

    if (! wrapper) {
      return;
    }

    const colorItems = wrapper.querySelectorAll('[data-color-input]');
    const cornersOptions = document.querySelector('[data-corners]');
    const root = document.documentElement;

    if (! colorItems) {
      return;
    }

    updatePreviewColor(root, colorItems);

    if (! cornersOptions) {
      return;
    }

    const cornerInputs = cornersOptions.querySelectorAll('input');
    const sfcf = document.querySelector('[data-sfcf]');

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
        })
      }

      const observer = new MutationObserver(callback);
      observer.observe(picker, options);
    }
  });
}

function updateCornersStyle(main, items) {
  items.forEach((input) => {
    if (input.id == 'sfcf-corners-square-true' && input.checked) {
      main.style.setProperty('--sfcf-radius-huge', 0 + 'px');
      main.style.setProperty('--sfcf-radius-big', 0 + 'px');
      main.style.setProperty('--sfcf-radius-medium', 0 + 'px');
      main.style.setProperty('--sfcf-radius-small', 0 + 'px');
      console.log('zereeo');
    }

    input.addEventListener('change', () => {
      if (input.id == 'sfcf-corners-square-true' && input.value == 'true') {
        main.style.setProperty('--sfcf-radius-huge', 0 + 'px');
        main.style.setProperty('--sfcf-radius-big', 0 + 'px');
        main.style.setProperty('--sfcf-radius-medium', 0 + 'px');
        main.style.setProperty('--sfcf-radius-small', 0 + 'px');
      } else {
        main.style.setProperty('--sfcf-radius-huge', 32 + 'px');
        main.style.setProperty('--sfcf-radius-big', 20 + 'px');
        main.style.setProperty('--sfcf-radius-medium', 16 + 'px');
        main.style.setProperty('--sfcf-radius-small', 6 + 'px');
      }
    });
  });
}