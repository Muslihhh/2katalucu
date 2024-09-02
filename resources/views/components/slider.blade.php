<!DOCTYPE html>
<html>
<head>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="relative w-full h-64 m-10 mx-auto rounded-lg">
    <div class="slider relative overflow-hidden rounded-lg h-full">
      <img id="slider-image" class="w-full h-full object-fill" src="https://images.bisnis.com/posts/2023/11/24/1716892/deretan_gunung_tertinggi_di_indonesia_salah_satunya_gunung_semeru_-_dok._shutterstock_1700805928.jpg" alt="Image 1">
    </div>
    <div class="absolute left-0 top-1/2 bottom-1/2 right-0 flex justify-between items-center px-4">
      <button class="slider-button text-gray-200 text-4xl  px-4 py-2 rounded-full" onclick="previousImage()">&lt;</button>
      <button class="slider-button text-gray-200 text-4xl  px-4 py-2 rounded-full" onclick="nextImage()">&gt;</button>
    </div>
  </div>

  <script>
    const images = [
      'https://images.bisnis.com/posts/2023/11/24/1716892/deretan_gunung_tertinggi_di_indonesia_salah_satunya_gunung_semeru_-_dok._shutterstock_1700805928.jpg',
      'https://asset-a.grid.id/crop/0x0:0x0/x/photo/2022/12/05/gunung-tertinggi-di-indonesiajp-20221205124551.jpg',
      'https://upload.wikimedia.org/wikipedia/commons/6/6b/Gunung_Kerinci_dari_Muaralabuh.jpg',
    ];

    let currentIndex = 0;

    function showImage(index) {
      const imageElement = document.getElementById('slider-image');
      imageElement.src = images[index];
    }

    function nextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      showImage(currentIndex);
    }

    function previousImage() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      showImage(currentIndex);
    }

    // Initial image
    showImage(currentIndex);

    setInterval(nextImage, 3000);
  </script>
</body>
</html>