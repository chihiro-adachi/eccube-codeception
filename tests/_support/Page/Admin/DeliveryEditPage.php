<?php


namespace Page\Admin;


class DeliveryEditPage extends AbstractAdminPageStyleGuide
{
    public function __construct(\AcceptanceTester $I)
    {
        parent::__construct($I);
    }

    public static function at($I)
    {
        $page = new self($I);
        return $page->atPage('配送方法登録・編集基本情報設定');
    }

    public function 入力_配送業者名($value) {
        $this->tester->fillField(['id' => 'delivery_name'], $value);
        return $this;
    }

    public function 入力_名称($value) {
        $this->tester->fillField(['id' => 'delivery_service_name'], $value);
        return $this;
    }

    public function 入力_支払方法選択($array) {
        foreach ($array as $id)
        {
            $this->tester->checkOption(['id' => "delivery_payments_${id}"]);
        }
        return $this;
    }

    public function 入力_全国一律送料($value) {
        $this->tester->fillField(['id' => 'delivery_free_all'], $value);
        $this->tester->click('#set_fee_all');
        return $this;
    }

    public function 登録()
    {
        $this->tester->click(['xpath' => '//*[@id="page_admin_setting_shop_delivery_new"]/div[1]/div[3]/form/div[2]/div/div/div[2]/div/div/button']);
        return $this;
    }

}