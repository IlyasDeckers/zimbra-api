<?php

namespace Zimbra\Admin\Tests\Request;

use Zimbra\Mail\Tests\ZimbraMailApiTestCase;
use Zimbra\Mail\Request\GetDataSourceUsage;

/**
 * Testcase class for GetDataSourceUsage.
 */
class MailGetDataSourceUsageTest extends ZimbraMailApiTestCase
{
    public function testGetDataSourceUsageRequest()
    {
        $req = new GetDataSourceUsage();
        $this->assertInstanceOf('Zimbra\Mail\Request\Base', $req);

        $xml = '<?xml version="1.0"?>'."\n"
            .'<GetDataSourceUsageRequest />';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);

        $array = array(
            'GetDataSourceUsageRequest' => array(
                '_jsns' => 'urn:zimbraMail',
            )
        );
        $this->assertEquals($array, $req->toArray());
    }

    public function testGetDataSourceUsageApi()
    {
        $this->api->getDataSourceUsage();

        $client = $this->api->getClient();
        $req = $client->lastRequest();
        $xml = '<?xml version="1.0"?>'."\n"
            .'<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope" xmlns:urn="urn:zimbra" xmlns:urn1="urn:zimbraMail">'
                .'<env:Body>'
                    .'<urn1:GetDataSourceUsageRequest />'
                .'</env:Body>'
            .'</env:Envelope>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);
    }
}
