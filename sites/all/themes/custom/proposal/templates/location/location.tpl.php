<?php

/**
 *
 * @file location.tpl.php
 * Default simple view template for a formatting the Location of a node.
 *
 */

?>

<div class="location vcard location-wrapper">

  <?php if (!empty($street) && !empty($city) && !empty($province)): ?>
  <div class="map">
    <a target="_blank" href="http://maps.google.com/maps?saddr=&daddr=<?php print $street . '+' . $city . '+' . $province;?>,+us&hl=en&sensor=false"><img src="http://maps.google.com/maps/api/staticmap?zoom=13&markers=color:gray|<?php print $street . '+' . $city . '+' . $province;?>&size=198x198&sensor=false" alt="" title="" /></a>
  </div>
  <?php endif; ?>
  
  <div class="adr">
    <?php if (!empty($name)): ?>
      <span class="fn"><?php print $name; ?></span></strong>
    <?php endif; ?>
    <?php if (!empty($street)): ?>
      <div class="street-address">
        <?php print $street; ?>
        <?php if (!empty($additional)): ?>
          <?php print ' ' . $additional; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($city)): ?>
      <span class="locality"><?php print $city; ?></span><?php if (!empty($province)) print ', '; ?>
    <?php endif; ?>
    <?php if (!empty($province)): ?>
      <span class="region"><?php print $province_print; ?></span>
    <?php endif; ?>
    <?php if (!empty($postal_code)): ?>
      <span class="postal-code"><?php print $postal_code; ?></span>
    <?php endif; ?>
    <?php if (!empty($country_name)): ?>
      <div class="country-name"><?php print $country_name; ?></div>
    <?php endif; ?>
    <?php if (!empty($phone)): ?>
      <div class="tel">
        <abbr class="type" title="voice"><?php print t("T"); ?>:</abbr>
        <span class="value"><?php print $phone; ?></span>
      </div>
    <?php endif; ?>
    <?php if (!empty($fax)): ?>
      <div class="tel">
        <abbr class="type" title="fax"><?php print t("F"); ?>:</abbr>
        <span><?php print $fax; ?></span>
      </div>
    <?php endif; ?>
    <?php // "Geo" microformat, see http://microformats.org/wiki/geo ?>
    <?php if (isset($latitude) && isset($longitude)): ?>
      <?php // Assume that 0, 0 is invalid. ?>
      <?php if ($latitude != 0 || $longitude != 0): ?>
        <span class="geo"><abbr class="latitude" title="<?php print $latitude; ?>"><?php print $latitude_dms; ?></abbr>, <abbr class="longitude" title="<?php print $longitude; ?>"><?php print $longitude_dms; ?></abbr></span>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <?php if (!empty($street) && !empty($city) && !empty($province)): ?>
    <p class="map-link"><a target="_blank" href="http://maps.google.com/maps?saddr=&daddr=<?php print $street . '+' . $city . '+' . $province;?>,+us&hl=en&sensor=false">Get directions</a></p>
  <?php endif; ?>
</div>
