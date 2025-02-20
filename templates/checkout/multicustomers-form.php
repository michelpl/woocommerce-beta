<?php

if (!function_exists('add_action')) {
    return;
}

use Woocommerce\Pagarme\Core;
use Woocommerce\Pagarme\Helper\Utils;
use Woocommerce\Pagarme\Model\Setting;

$setting = Setting::get_instance();

if (!$setting->is_active_multicustomers()) {
    return;
}

$wc_countries = new WC_Countries();
$states       = $wc_countries->get_states('BR');
/** phpcs:disable */
?>

<fieldset data-ref="<?php echo esc_attr($ref); ?>" style="display:none;">
    <?php echo isset($title) ? "<h4>{$title}</h4>" : ''; ?>
    <div class="multicustomer">
        <p class="form-row form-row-wide">
            <label>
                <?php esc_html_e('Full Name', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[name]" data-required="true" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-wide">
            <label>
                <?php esc_html_e('Email', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[email]" data-required="true" type="email" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-wide">
            <label>
                <?php esc_html_e('CPF', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[cpf]" data-required="true" data-mask="000.000.000-00" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-first">
            <label>
                <?php esc_html_e('Zip Code', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[zip_code]" data-required="true" data-mask="00000-000" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-last">
            <label>
                <?php esc_html_e('Street', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[street]" data-required="true" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-first">
            <label>
                <?php esc_html_e('Number', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[number]" data-required="true" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-last">
            <label>
                <?php esc_html_e('Neighborhood', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[neighborhood]" data-required="true" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-wide">
            <label>
                <?php esc_html_e('Complement', 'woo-pagarme-payments'); ?>
                <input name="multicustomer_<?php echo $type; ?>[complement]" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-first">
            <label>
                <?php esc_html_e('City', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <input name="multicustomer_<?php echo $type; ?>[city]" data-required="true" class="input-text">
            </label>
        </p>
        <p class="form-row form-row-last">
            <label>
                <?php esc_html_e('State', 'woo-pagarme-payments'); ?> <span class="required">*</span>
                <select data-required="true" data-element="state" name="multicustomer_<?php echo $type; ?>[state]">
                    <?php
                    foreach ($states as $uf => $state) {
                        printf('<option value="%s">%s</option>', esc_html($uf), esc_html($state));
                    }
                    ?>
                </select>
            </label>
        </p>
    </div>
</fieldset>
