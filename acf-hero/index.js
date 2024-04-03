import { Slider } from 'lib/sliders';

const initHeroSlider = () => {
	[...document.querySelectorAll('.block-hero--slider')].forEach(
        (block) => {
			const sliderWrapper = block.querySelector('.block-hero__slider-wrapper');
			const customAutoPlay = block.dataset.autoplay;
			const customAutoPlaySpeed = block.dataset.autoplaySpeed ? block.dataset.autoplaySpeed : 3000;

            return new Slider(sliderWrapper, {
                fade: false,
				autoplay: customAutoPlay,
				autoplaySpeed: customAutoPlaySpeed,
                slidesToShow: 1,
                variableWidth: false,
                centerMode: false,
                infinite: true,
                arrows: true,
                dots: true,
                appendDots: document.querySelector(".block-hero__slider-dots"),
                prevArrow: document.querySelector(".block-hero__slider-prev"),
                nextArrow: document.querySelector(".block-hero__slider-next")
            });
        }
    );
};

initHeroSlider();

if (window.acf) {
    window.acf.addAction(
        'render_block_preview/type=hero',
        initHeroSlider
    );
}