<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div id="slider" class="relative w-full mx-auto">
            <!-- Slides -->
            <div class="relative overflow-hidden rounded-lg">
                <?php
                $images = ['Banner1.png', 'Banner2.png', 'Banner3.png'];
foreach ($images as $index => $image) {
    echo '<div class="slide ' . ($index === 0 ? 'block' : 'hidden') . '">';
    echo '<img src="' . asset('images/' . $image) . '" class="w-full lg:h-96 sm:h-60">';
    echo '</div>';
}

                ?>
            </div>
            <!-- Indicators -->
            <div class="absolute bottom-0 left-0 right-0 flex justify-center p-4">
                <?php
                foreach ($images as $index => $image) {
                    echo '<button class="indicator w-2 h-2 mx-1 rounded-full ' . ($index === 0 ? 'bg-blue-500' : 'bg-gray-100') . '" data-slide="' . $index . '"></button>';
                }
                ?>
            </div>
            <!-- Navigation Buttons -->
            <button id="prev" class=" fas fa-angle-left absolute left-0 top-1/2 transform -translate-y-1/2 text-4xl text-white px-4 py-2 rounded-l-lg"></button>
            <button id="next" class="fas fa-angle-right absolute right-0 top-1/2 transform -translate-y-1/2 text-4xl text-white px-4 py-2 rounded-r-lg"></button>
        </div>
    </div>
    <script>
      const slides = document.querySelectorAll('.slide');
      const indicators = document.querySelectorAll('.indicator');
      let currentIndex = 0;
  
      function showSlide(index) {
          slides.forEach(slide => slide.classList.add('hidden'));
          slides[index].classList.remove('hidden');
          indicators.forEach(ind => {
              ind.classList.remove('bg-blue-500');
              ind.classList.add('bg-gray-100');
          });
          indicators[index].classList.remove('bg-gray-100');
          indicators[index].classList.add('bg-blue-500');
      }
  
      document.getElementById('next').addEventListener('click', () => {
          currentIndex = (currentIndex + 1) % slides.length;
          showSlide(currentIndex);
      });
  
      document.getElementById('prev').addEventListener('click', () => {
          currentIndex = (currentIndex - 1 + slides.length) % slides.length;
          showSlide(currentIndex);
      });
  
      indicators.forEach((indicator, index) => {
          indicator.addEventListener('click', () => {
              currentIndex = index;
              showSlide(currentIndex);
          });
      });

      function startAutoSlide() {
          slideInterval = setInterval(() => {
              currentIndex = (currentIndex + 1) % slides.length;
              showSlide(currentIndex);
          }, 3000); // Change the interval time as needed
      }
  
      // Initial display
      showSlide(currentIndex);
      startAutoSlide();
  </script>
  
</body>
</html>
