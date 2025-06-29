<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cover_image_url = '';
foreach ( $event_data['images'] as $image ) {
    if ( $image['is_cover'] ) {
        $cover_image_url = $image['url'];
        break;
    }
}

?>

<div class="bg-white">

  <!-- Hero Section -->
  <div class="relative">
    <?php if ( ! empty( $cover_image_url ) ) : ?>
      <img src="<?php echo esc_url( $cover_image_url ); ?>" alt="<?php echo esc_attr( $event_data['title'] ); ?>" class="w-full object-cover aspect-[3/1]">
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
    <div class="absolute bottom-0 left-0 p-6">
      <h1 class="text-3xl md:text-5xl font-bold text-white"><?php echo esc_html( $event_data['title'] ); ?></h1>
      <?php if ( ! empty( $event_data['tagline'] ) ) : ?>
        <p class="mt-2 text-white"><?php echo esc_html( $event_data['tagline'] ); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Main Content -->
  <div class="max-w-5xl mx-auto px-4 py-8 space-y-6">

    <!-- Event Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg">
        <i class="fa-solid fa-calendar text-primary-600"></i>
        <div>
          <p class="text-sm text-gray-500">Starts</p>
          <p class="font-semibold"><?php echo esc_html( $event_data['starts_at'] ); ?></p>
        </div>
      </div>
      <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg">
        <i class="fa-solid fa-clock text-primary-600"></i>
        <div>
          <p class="text-sm text-gray-500">Ends</p>
          <p class="font-semibold"><?php echo esc_html( $event_data['ends_at'] ); ?></p>
        </div>
      </div>
      <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg">
        <i class="fa-solid fa-location-dot text-primary-600"></i>
        <div>
          <p class="text-sm text-gray-500">Location</p>
          <p class="font-semibold"><?php echo esc_html( $event_data['location']['onsite_instructions'] ); ?></p>
        </div>
      </div>
    </div>

    <!-- Description -->
    <div class="prose max-w-none">
      <?php echo wp_kses_post( $event_data['description'] ); ?>
    </div>

    <!-- Register Button -->
    <div class="mt-8 text-center">
      <a href="<?php echo esc_url( $event_data['checkout_url'] ); ?>" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium px-6 py-3 rounded-md shadow transition">
        Register Now
      </a>
    </div>
  </div>

  <!-- Sticky Mobile CTA -->
  <div class="fixed bottom-0 left-0 right-0 bg-primary-600 text-white text-center py-3 md:hidden">
    <a href="<?php echo esc_url( $event_data['checkout_url'] ); ?>" class="block font-semibold">Register Now</a>
  </div>

</div>
