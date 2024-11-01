let index = 0;
const images = document.querySelector('.carousel-images').children;
const totalImages = images.length;
const carousel = document.querySelector('.carousel');

function changeImage() {
    index++;
    if (index === totalImages) {
        index = 0;
    }

    // 重置所有图片的位置
    for (let i = 0; i < totalImages; i++) {
        images[i].style.transform = `translateX(${i * 100}%)`;
    }

    // 仅将当前图片置于可见位置
    images[index].style.transform = `translateX(0)`;
}

 设置轮播图自动播放每3秒更换一张图片
// setInterval(changeImage, 3000);

//  也可以添加鼠标悬停时停止播放的逻辑
// carousel.onmouseenter = function() {
//     clearInterval(carousel.intervalId);
// };
// carousel.onmouseleave = function() {
//     //carousel.intervalId = setInterval(changeImage, 3000);
// };

// 注意：上面的鼠标悬停逻辑需要稍微修改，因为我们在setTimeout外部没有设置intervalId
// 下面的代码演示了如何正确地实现这一功能
carousel.intervalId = setInterval(changeImage, 3000);
carousel.onmouseenter = function() {
    clearInterval(carousel.intervalId);
};
carousel.onmouseleave = function() {
    carousel.intervalId = setInterval(changeImage, 3000);
};