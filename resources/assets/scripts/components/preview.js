export const preview = () => {
  let root = document.documentElement;

  setTimeout(() => {
    const wrapper = document.querySelector('[data-color-inputs]');

    if (! wrapper) {
      return;
    }

    const items = wrapper.querySelectorAll('[data-color-input]');

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
            console.log('mutation kurwa');

            const newValue = input.value;
            root.style.setProperty(`--${input.name}`, newValue);
          })
        }

        const observer = new MutationObserver(callback);
        observer.observe(picker, options);
      }
    });
  }, 1000);
};