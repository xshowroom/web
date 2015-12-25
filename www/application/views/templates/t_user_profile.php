<div class=" profile-content">
    <h2><?=__("profile__BASIC_INFO")?></h2>
    <div class="form-line">
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__EMAIL")?></label>
            <label class="lb_item_field"><?= $user['email'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__FIRST_NAME")?></label>
            <label class="lb_item_field"><?= $userAttr['first_name'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__LAST_NAME")?></label>
            <label class="lb_item_field"><?= $userAttr['last_name'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__DISPLAY_NAME")?></label>
            <label class="lb_item_field"><?= $userAttr['display_name'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__TELEPHONE")?></label>
            <label class="lb_item_field"><?= $userAttr['telephone'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__MOBILE")?></label>
            <label class="lb_item_field"><?= empty($userAttr['mobile']) ? "(N/A)" : $userAttr['mobile'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__REGISTER_DATE")?></label>
            <label class="lb_item_field"><?= $user['register_date'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__LAST_LOGIN_TIME")?></label>
            <label class="lb_item_field"><?= empty($user['last_login_time']) ? "(N/A)" :  $user['last_login_time'] ?></label>
        </div>
    </div>

    <h2><?=__("profile__COMPANY_INFO")?></h2>
    <div class="form-line">
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_NAME")?></label>
            <label class="lb_item_field"><?= $userAttr['company_name'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_ADDRESS")?></label>
            <label class="lb_item_field"><?= $userAttr['company_address'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_COUNTRY")?></label>
            <label class="lb_item_field">{{'<?= $userAttr['company_country'] ?>' | translate }}</label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_ZIP")?></label>
            <label class="lb_item_field"><?= $userAttr['company_zip'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_TELEPHONE")?></label>
            <label class="lb_item_field"><?= $userAttr['company_telephone'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__COMPANY_WEB_URL")?></label>
            <a class="lb_item_field" href="<?= $userAttr['company_web_url'] ?>" target="_blank"><?= $userAttr['company_web_url'] ?></a>
        </div>
    </div>

    <?php if($user['role_type'] == Model_User::TYPE_USER_BRAND): ?>
    <h2><?=__("profile__BRAND_INFO")?></h2>
    <div class="form-line">
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__BRAND_NAME")?></label>
            <label class="lb_item_field"><?= $brandInfo['brand_name'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__DESIGNER_NAME")?></label>
            <label class="lb_item_field"><?= $brandInfo['designer_name'] ?></label>
        </div>
        <div class="form-group">
            <label class="lb_item_name"><?=__("profile__BRAND_URL")?></label>
            <a class="lb_item_field" href="<?= URL::site("brands/".$brandInfo['brand_url'], 'http') ?>" target="_blank"><?= URL::site("brands/".$brandInfo['brand_url'], 'http') ?></a>
        </div>
        <div class="form-group">
            <img src="<?= URL::site($brandInfo['brand_image']) ?>"/>
        </div>
    </div>
    <?php endif; ?>
</div>