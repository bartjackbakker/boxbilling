<?php
namespace Box\Tests\Mod\Support;

use RedBeanPHP\OODBBean;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Box\Mod\Support\Service
     */
    protected $service = null;

    public function setup()
    {
        $this->service = new \Box\Mod\Support\Service();
    }

    public function testDi()
    {
        $di = new \Box_Di();
        $this->service->setDi($di);
        $getDi = $this->service->getDi();
        $this->assertEquals($di, $getDi);
    }

    public function testOnAfterClientOpenTicket()
    {
        $toApiArrayReturn = array(
            'client' => array(
                'id' => rand(1, 100)
            )
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getTicketById', 'toApiArray'))->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getTicketById')
            ->will($this->returnValue($supportTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('toApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_client'] = new \Model_Client();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterClientOpenTicket($eventMock);
        $this->assertNull($result);
    }

    public function testOnAfterAdminOpenTicket()
    {
        $toApiArrayReturn = array(
            'client' => array(
                'id' => rand(1, 100)
            )
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getTicketById', 'toApiArray'))->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getTicketById')
            ->will($this->returnValue($supportTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('toApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_admin'] = new \Model_Admin();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterAdminOpenTicket($eventMock);
        $this->assertNull($result);
    }

    public function testOnAfterAdminCloseTicket()
    {
        $toApiArrayReturn = array(
            'client' => array(
                'id' => rand(1, 100)
            )
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getTicketById', 'toApiArray'))->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getTicketById')
            ->will($this->returnValue($supportTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('toApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_admin'] = new \Model_Admin();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterAdminCloseTicket($eventMock);
        $this->assertNull($result);
    }

    public function testOnAfterAdminReplyTicket()
    {
        $toApiArrayReturn = array(
            'client' => array(
                'id' => rand(1, 100)
            )
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getTicketById', 'toApiArray'))->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getTicketById')
            ->will($this->returnValue($supportTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('toApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_admin'] = new \Model_Admin();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterAdminReplyTicket($eventMock);
        $this->assertNull($result);
    }

    public function testOnAfterGuestPublicTicketOpen()
    {
        $toApiArrayReturn = array(
            'author_email' => 'email@example.com',
            'author_name'  => 'Name',
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getPublicTicketById', 'publicToApiArray'))->getMock();
        $supportPTicketModel = new \Model_SupportPTicket();
        $supportPTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getPublicTicketById')
            ->will($this->returnValue($supportPTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('publicToApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterGuestPublicTicketOpen($eventMock);
        $this->assertNull($result);
    }

    public function testOnAfterAdminPublicTicketOpen()
    {
        $toApiArrayReturn = array(
            'author_email' => 'email@example.com',
            'author_name'  => 'Name',
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getPublicTicketById', 'publicToApiArray'))->getMock();
        $supportPTicketModel = new \Model_SupportPTicket();
        $supportPTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getPublicTicketById')
            ->will($this->returnValue($supportPTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('publicToApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_admin'] = new \Model_Admin();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterAdminPublicTicketOpen($eventMock);
        $this->assertNull($result);
    }

    public function testOnAfterAdminPublicTicketReply()
    {
        $toApiArrayReturn = array(
            'author_email' => 'email@example.com',
            'author_name'  => 'Name',
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getPublicTicketById', 'publicToApiArray'))->getMock();
        $supportPTicketModel = new \Model_SupportPTicket();
        $supportPTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getPublicTicketById')
            ->will($this->returnValue($supportPTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('publicToApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_admin'] = new \Model_Admin();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterAdminPublicTicketReply($eventMock);
        $this->assertNull($result);
    }


    public function testOnAfterAdminPublicTicketClose()
    {
        $toApiArrayReturn = array(
            'author_email' => 'email@example.com',
            'author_name'  => 'Name',
        );
        $serviceMock      = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('getPublicTicketById', 'publicToApiArray'))->getMock();
        $supportPTicketModel = new \Model_SupportPTicket();
        $supportPTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $serviceMock->expects($this->atLeastOnce())->method('getPublicTicketById')
            ->will($this->returnValue($supportPTicketModel));
        $serviceMock->expects($this->atLeastOnce())->method('publicToApiArray')
            ->will($this->returnValue($toApiArrayReturn));

        $emailServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('sendTemplate'))->getMock();
        $emailServiceMock->expects($this->atLeastOnce())->method('sendTemplate')
            ->will($this->returnValue(true));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function ($serviceName) use ($emailServiceMock, $serviceMock) {
            if ('email' == $serviceName){
                return $emailServiceMock;
            }
            if ('support' == $serviceName){
                return $serviceMock;
            }
        });
        $di['loggedin_admin'] = new \Model_Admin();
        $serviceMock->setDi($di);

        $eventMock = $this->getMockBuilder('\Box_Event')->disableOriginalConstructor()
            ->getMock();
        $eventMock->expects($this->atLeastOnce())
            ->method('getDi')
            ->will($this->returnValue($di));

        $result = $serviceMock->onAfterAdminPublicTicketClose($eventMock);
        $this->assertNull($result);
    }

    public function testGetTicketById()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getExistingModelById')
            ->will($this->returnValue(new \Model_SupportTicket()));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->getTicketById(rand(1, 100));
        $this->assertInstanceOf('Model_SupportTicket', $result);
    }

    public function testGetPublicTicketById()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock->expects($this->atLeastOnce())
            ->method('getExistingModelById')
            ->will($this->returnValue($supportTicketModel));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->getPublicTicketById(rand(1, 100));
        $this->assertInstanceOf('Model_SupportTicket', $result);
    }

    public function testGetStatuses()
    {
        $result = $this->service->getStatuses();
        $this->assertInternalType('array', $result);
    }

    public function testFindOneByClient()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue($supportTicketModel));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $result = $this->service->findOneByClient($client, rand(1, 100));
        $this->assertInstanceOf('Model_SupportTicket', $result);
    }

    /**
     * @expectedException \Box_Exception
     */
    public function testFindOneByClientNotFoundException()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue(null));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $result = $this->service->findOneByClient($client, rand(1, 100));
        $this->assertInstanceOf('Model_SupportTicket', $result);
    }

    public function testGetSearchQueryProvider()
    {
        return array(
            array(
                array('search'              => 'query',
                      'id'                  => rand(1, 100),
                      'status'              => 'open',
                      'client_id'           => rand(1, 100),
                      'client'              => 'Client name',
                      'order_id'            => rand(1, 100),
                      'subject'             => 'subject',
                      'content'             => 'Content',
                      'support_helpdesk_id' => rand(1, 100),
                      'created_at'          => date('c'),
                      'date_from'           => date('c'),
                      'date_to'             => date('c'),
                      'priority'            => rand(1, 100),
                )
            ),
            array(
                array(
                    'search'              => rand(1, 100),
                    'id'                  => rand(1, 100),
                    'status'              => 'open',
                    'client_id'           => rand(1, 100),
                    'client'              => 'Client name',
                    'order_id'            => rand(1, 100),
                    'subject'             => 'subject',
                    'content'             => 'Content',
                    'support_helpdesk_id' => rand(1, 100),
                    'created_at'          => date('c'),
                    'date_from'           => date('c'),
                    'date_to'             => date('c'),
                    'priority'            => rand(1, 100),
                )
            )
        );
    }

    /**
     * @dataProvider testGetSearchQueryProvider
     */
    public function testGetSearchQuery($data)
    {
        list($query, $bindings) = $this->service->getSearchQuery($data);
        $this->assertInternalType('string', $query);
        $this->assertInternalType('array', $bindings);
    }

    public function testCounter()
    {
        $arr    = array(
            \Model_SupportTicket::OPENED => rand(1, 100),
            \Model_SupportTicket::ONHOLD => rand(1, 100),
            \Model_SupportTicket::CLOSED => rand(1, 100),
        );
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getAssoc')
            ->will($this->returnValue($arr));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->counter();
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertEquals(array_sum($arr), $result['total']);
    }

    public function testGetLatest()
    {
        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array($ticket, $ticket)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->getLatest();
        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('Model_SupportTicket', $result[0]);
    }

    public function testGetExpired()
    {
        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getAll')
            ->will($this->returnValue(array()));
        $dbMock->expects($this->atLeastOnce())
            ->method('convertToModels')
            ->will($this->returnValue(array($ticket,$ticket)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->getExpired();
        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('Model_SupportTicket', $result[0]);
    }

    public function testCountByStatus()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getCell')
            ->will($this->returnValue(rand(1, 100)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->countByStatus('open');
        $this->assertInternalType('integer', $result);
    }

    public function testGetActiveTicketsCountForOrder()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getCell')
            ->will($this->returnValue(rand(1, 100)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $order = new \Model_ClientOrder();
        $order->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->getActiveTicketsCountForOrder($order);
        $this->assertInternalType('integer', $result);
    }

    public function testCheckIfTaskAlreadyExistsTrue()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $supportTicketModel = new \Model_SupportTicket();
        $supportTicketModel->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue($supportTicketModel));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->checkIfTaskAlreadyExists($client, rand(1, 100), rand(1, 100), rand(1, 100));
        $this->assertTrue($result);
    }

    public function testCheckIfTaskAlreadyExistsFalse()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue(false));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->checkIfTaskAlreadyExists($client, rand(1, 100), rand(1, 100), 'Task');
        $this->assertFalse($result);
    }

    public function testCloseTicketProvider()
    {
        return array(
            array(new \Model_Admin()),
            array(new \Model_Client())
        );
    }

    /**
     * @dataProvider testCloseTicketProvider
     */
    public function testCloseTicket($identity)
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->closeTicket($ticket, $identity);
        $this->assertTrue($result);
    }

    public function testAutoClose()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->autoClose($ticket);
        $this->assertTrue($result);
    }

    public function testCanBeReopenedNotClosed()
    {
        $helpdesk = New \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->never())
            ->method('getExistingModelById')
            ->will($this->returnValue($helpdesk));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->canBeReopened($ticket);
        $this->assertTrue($result);
    }

    public function testCanBeReopened()
    {
        $helpdesk = New \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());
        $helpdesk->support_helpdesk_id = rand(1, 100);
        $helpdesk->can_reopen          = true;

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getExistingModelById')
            ->will($this->returnValue($helpdesk));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $ticket->status = \Model_SupportTicket::CLOSED;

        $result = $this->service->canBeReopened($ticket);
        $this->assertTrue($result);
    }

    public function testRmByClient()
    {
        $model = new \Model_SupportTicket();
        $model->loadBean(new \RedBeanPHP\OODBBean());
        $model->id = rand(1, 100);

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array($model)));
        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());


        $result = $this->service->rmByClient($client);
        $this->assertNull($result);
    }

    public function testRm()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->at(0))
            ->method('find')
            ->with($this->equalTo('SupportTicketNote'))
            ->will($this->returnValue(array(new \Model_SupportTicketNote(), new \Model_SupportTicketNote())));
        $dbMock->expects($this->at(3))
            ->method('find')
            ->with($this->equalTo('SupportTicketMessage'))
            ->will($this->returnValue(array(new \Model_SupportTicketMessage(), new \Model_SupportTicketMessage())));

        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->rm($ticket);
        $this->assertTrue($result);
    }

    public function testToApiArray()
    {
        $supportTicketMessageModel = new \Model_SupportTicketMessage();
        $supportTicketMessageModel->loadBean(new \RedBeanPHP\OODBBean());
        $helpdesk = New \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue($supportTicketMessageModel));
        $dbMock->expects($this->at(1))
            ->method('load')
            ->with($this->equalTo('SupportHelpdesk'))
            ->will($this->returnValue($helpdesk));
        $dbMock->expects($this->at(2))
            ->method('load')
            ->will($this->returnValue(new \Model_Client()));
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array(new \Model_SupportTicketNote())));

        $ticketMessages = array(new \Model_SupportTicketMessage(), new \Model_SupportTicketMessage());
        $serviceMock    = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('messageGetRepliesCount', 'messageToApiArray', 'helpdeskToApiArray', 'messageGetTicketMessages', 'noteToApiArray', 'getClientApiArrayForTicket'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('messageGetRepliesCount')
            ->will($this->returnValue(rand(1, 100)));
        $serviceMock->expects($this->atLeastOnce())->method('messageToApiArray')
            ->will($this->returnValue(array()));
        $serviceMock->expects($this->atLeastOnce())->method('helpdeskToApiArray')
            ->will($this->returnValue(array()));
        $serviceMock->expects($this->atLeastOnce())->method('messageGetTicketMessages')
            ->will($this->returnValue($ticketMessages));
        $serviceMock->expects($this->atLeastOnce())->method('noteToApiArray')
            ->will($this->returnValue(null));
        $serviceMock->expects($this->atLeastOnce())->method('getClientApiArrayForTicket')
            ->will($this->returnValue(array()));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $serviceMock->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $serviceMock->toApiArray($ticket, true, new \Model_Admin());
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('replies', $result);
        $this->assertArrayHasKey('helpdesk', $result);
        $this->assertArrayHasKey('messages', $result);

        $this->assertEquals(count($result['messages']), count($ticketMessages));
    }

    public function testToApiArrayWithRelDetails()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue(new \Model_SupportTicketMessage()));
        $dbMock->expects($this->at(1))
            ->method('load')
            ->with($this->equalTo('SupportHelpdesk'))
            ->will($this->returnValue(new \Model_SupportHelpdesk()));
        $dbMock->expects($this->at(2))
            ->method('load')
            ->will($this->returnValue(new \Model_Client()));
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array(new \Model_SupportTicketNote())));

        $ticketMessages = array(new \Model_SupportTicketMessage(), new \Model_SupportTicketMessage());
        $serviceMock    = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('messageGetRepliesCount', 'messageToApiArray', 'helpdeskToApiArray', 'messageGetTicketMessages', 'noteToApiArray', 'getClientApiArrayForTicket'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('messageGetRepliesCount')
            ->will($this->returnValue(rand(1, 100)));
        $serviceMock->expects($this->atLeastOnce())->method('messageToApiArray')
            ->will($this->returnValue(array()));
        $serviceMock->expects($this->atLeastOnce())->method('helpdeskToApiArray')
            ->will($this->returnValue(array()));
        $serviceMock->expects($this->atLeastOnce())->method('messageGetTicketMessages')
            ->will($this->returnValue($ticketMessages));
        $serviceMock->expects($this->atLeastOnce())->method('noteToApiArray')
            ->will($this->returnValue(null));
        $serviceMock->expects($this->atLeastOnce())->method('getClientApiArrayForTicket')
            ->will($this->returnValue(array()));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $serviceMock->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $ticket->rel_id = rand(1, 100);
        $ticket->rel_type = 'Type';

        $result = $serviceMock->toApiArray($ticket, true, new \Model_Admin());
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('replies', $result);
        $this->assertArrayHasKey('helpdesk', $result);
        $this->assertArrayHasKey('messages', $result);

        $this->assertEquals(count($result['messages']), count($ticketMessages));
    }

    public function testGetClientApiArrayForTicket()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue(new \Model_Client()));

        $clientServiceMock = $this->getMockBuilder('\Box\Mod\Client\Service')
            ->setMethods(array('toApiArray'))->getMock();
        $clientServiceMock->expects($this->atLeastOnce())->method('toApiArray')
            ->will($this->returnValue(array()));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $di['mod_service']    = $di->protect(function () use ($clientServiceMock) {
            return $clientServiceMock;
        });
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->getClientApiArrayForTicket($ticket);

        $this->assertInternalType('array', $result);
    }

    public function testGetClientApiArrayForTicketClientNotExists()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue(null));

        $clientServiceMock = $this->getMockBuilder('\Box\Mod\Client\Service')
            ->setMethods(array('toApiArray'))->getMock();
        $clientServiceMock->expects($this->never())->method('toApiArray')
            ->will($this->returnValue(array()));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $di['mod_service']    = $di->protect(function () use ($clientServiceMock) {
            return $clientServiceMock;
        });
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->getClientApiArrayForTicket($ticket);

        $this->assertInternalType('array', $result);
    }

    public function testNoteGetAuthorDetails()
    {
        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->name = 'AdminName';

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue($admin));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $note = new \Model_SupportTicketNote();
        $note->loadBean(new \RedBeanPHP\OODBBean());

        $this->service->noteGetAuthorDetails($note);
    }

    public function testNoteRm()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $note = new \Model_SupportTicketNote();
        $note->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->noteRm($note);
        $this->assertTrue($result);
    }

    public function testNoteToApiArray()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));

        $serviceMock = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('noteGetAuthorDetails'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('noteGetAuthorDetails')
            ->will($this->returnValue(array()));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $serviceMock->setDi($di);

        $note = new \Model_SupportTicketNote();
        $note->loadBean(new \RedBeanPHP\OODBBean());

        $result = $serviceMock->noteToApiArray($note);
        $this->assertArrayHasKey('author', $result);
        $this->assertInternalType('array', $result['author']);
    }

    public function testHelpdeskGetSearchQuery()
    {
        $data = array(
            'search' => 'SearchQuery'
        );
        list($query, $bindings) = $this->service->helpdeskGetSearchQuery($data);

        $expectedBindings = array(
            ':name'      => '%SearchQuery%',
            ':email'     => '%SearchQuery%',
            ':signature' => '%SearchQuery%',
        );

        $this->assertInternalType('string', $query);
        $this->assertInternalType('array', $bindings);

        $this->assertEquals($expectedBindings, $bindings);
    }

    public function testHelpdeskGetPairs()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getAssoc')
            ->will($this->returnValue(array(0 => 'General')));


        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $this->service->setDi($di);

        $note = new \Model_SupportTicketNote();
        $note->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->helpdeskGetPairs();
        $this->assertInternalType('array', $result);
    }

    public function testHelpdeskRm()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array()));

        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());
        $helpdesk->id = rand(1, 100);
        $result       = $this->service->helpdeskRm($helpdesk);
        $this->assertTrue($result);
    }

    /**
     * @expectedException \Box_Exception
     */
    public function testHelpdeskRmHAsTicketsException()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array(new \Model_SupportTicket())));

        $dbMock->expects($this->never())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());
        $helpdesk->id = rand(1, 100);
        $result       = $this->service->helpdeskRm($helpdesk);
        $this->assertTrue($result);
    }

    public function testHelpdeskToApiArray()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());
        $helpdesk->id = rand(1, 100);
        $result       = $this->service->helpdeskToApiArray($helpdesk);
        $this->assertInternalType('array', $result);
    }

    public function testMessageGetTicketMessages()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array(new \Model_SupportTicketMessage())));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $ticket->id = rand(1, 100);

        $result = $this->service->messageGetTicketMessages($ticket);
        $this->assertInternalType('array', $result);
    }

    public function testMessageGetRepliesCount()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getCell')
            ->will($this->returnValue(rand(1, 100)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $ticket->id = rand(1, 100);

        $result = $this->service->messageGetRepliesCount($ticket);
        $this->assertInternalType('integer', $result);
    }

    public function testMessageGetAuthorDetailsAdmin()
    {
        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->id = rand(1, 100);

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue($admin));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $ticketMsg = new \Model_SupportTicketMessage();
        $ticketMsg->loadBean(new \RedBeanPHP\OODBBean());
        $ticketMsg->admin_id = rand(1, 100);

        $result = $this->service->messageGetAuthorDetails($ticketMsg);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('email', $result);
    }

    public function testMessageGetAuthorDetailsClient()
    {
        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue($client));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $ticketMsg = new \Model_SupportTicketMessage();
        $ticketMsg->loadBean(new \RedBeanPHP\OODBBean());
        $ticketMsg->client_id = rand(1, 100);

        $result = $this->service->messageGetAuthorDetails($ticketMsg);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('email', $result);
    }

    public function testMessageToApiArray()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));

        $serviceMock = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('messageGetAuthorDetails'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('messageGetAuthorDetails')
            ->will($this->returnValue(array()));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $serviceMock->setDi($di);

        $ticketMsg = new \Model_SupportTicketMessage();
        $ticketMsg->loadBean(new \RedBeanPHP\OODBBean());
        $ticketMsg->id = rand(1, 100);

        $result = $serviceMock->messageToApiArray($ticketMsg);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('author', $result);
    }

    public function testTicketUpdate()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'support_helpdesk_id' => rand(1, 100),
            'status'              => \Model_SupportTicket::OPENED,
            'subject'             => 'Subject',
            'priority'            => rand(1, 100),
        );

        $result = $this->service->ticketUpdate($ticket, $data);
        $this->assertTrue($result);
    }

    public function testTicketMessageUpdate()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'support_helpdesk_id' => rand(1, 100),
            'status'              => \Model_SupportTicket::OPENED,
            'subject'             => 'Subject',
            'priority'            => rand(1, 100),
        );

        $result = $this->service->ticketMessageUpdate($message, $data);
        $this->assertTrue($result);
    }

    public function testTicketReplyProvider()
    {
        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->id = rand(1, 100);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        return array(
            array($admin),
            array($client)
        );
    }

    /**
     * @dataProvider testTicketReplyProvider
     */
    public function testTicketReply($identity)
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($message));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());


        $result = $this->service->ticketReply($ticket, $identity, 'Content');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testTicketCreateForAdmin()
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($message));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->id = rand(1, 100);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $data = array(
            'subject' => 'Subject',
            'content' => 'Content'
        );

        $result = $this->service->ticketCreateForAdmin($client, $helpdesk, $data, $admin);
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testTicketCreateForGuest()
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($message));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $validatorMock = $this->getMockBuilder('\Box_Validate')->getMock();
        $validatorMock->expects($this->atLeastOnce())->method('isEmailValid');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['validator']      = $validatorMock;
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'name'    => 'Name',
            'email'   => 'email@example.com',
            'subject' => 'Subject',
            'message' => 'message'
        );

        $result = $this->service->ticketCreateForGuest($data);
        $this->assertInternalType('string', $result);
        $this->assertEquals(strlen($result), 40);
    }

    public function testTicketCreateForClient()
    {
        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->with('SupportTicket')
            ->will($this->returnValue($ticket));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));
        $dbMock->expects($this->atLeastOnce())
            ->method('getExistingModelById')
            ->will($this->returnValue(new \Model_SupportPr()));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->method('fire');

        $config         = array(
            'autorespond_enable'     => 1,
            'autorespond_message_id' => rand(1, 100)
        );
        $supportModMock = $this->getMockBuilder('\Box_Mod')->disableOriginalConstructor()
            ->setMethods(array('getConfig'))->getMock();
        $supportModMock->expects($this->atLeastOnce())->method('getConfig')
            ->will($this->returnValue($config));

        $staffServiceMock = $this->getMockBuilder('\Box\Mod\Staff\Service')
            ->setMethods(array('getCronAdmin'))->getMock();
        $staffServiceMock->expects($this->atLeastOnce())->method('getCronAdmin')
            ->will($this->returnValue(new \Model_Admin()));

        $serviceMock = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('ticketReply', 'messageCreateForTicket', 'cannedToApiArray'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('ticketReply')
            ->will($this->returnValue(new \Model_Admin()));
        $serviceMock->expects($this->atLeastOnce())->method('messageCreateForTicket')
            ->will($this->returnValue(new \Model_Admin()));
        $serviceMock->expects($this->atLeastOnce())->method('cannedToApiArray')
            ->will($this->returnValue(array('content' => 'Content')));

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['events_manager'] = $eventMock;
        $di['mod']            = $di->protect(function () use ($supportModMock) {
            return $supportModMock;
        });
        $di['mod_service']    = $di->protect(function () use ($staffServiceMock) {
            return $staffServiceMock;
        });
        $serviceMock->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $guest     = new \Model_Guest();
        $guest->id = rand(1, 100);

        $data = array(
            'name'    => 'Name',
            'email'   => 'email@example.com',
            'subject' => 'Subject',
            'content' => 'content'
        );

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $result = $serviceMock->ticketCreateForClient($client, $helpdesk, $data);
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    /**
     * @expectedException \Box_Exception
     */
    public function testTicketCreateForClientTaskAlreadyExistsException()
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $serviceMock = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('checkIfTaskAlreadyExists'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('checkIfTaskAlreadyExists')
            ->will($this->returnValue(true));

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $guest     = new \Model_Guest();
        $guest->id = rand(1, 100);

        $data = array(
            'rel_id'        => rand(1, 100),
            'rel_type'      => 'Type',
            'rel_task'      => 'Task',
            'rel_new_value' => 'New value',
        );

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $serviceMock->ticketCreateForClient($client, $helpdesk, $data);
    }

    public function testMessageCreateForTicketProvider()
    {
        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->id = rand(1, 100);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);
        return array(
            array(
                $admin
            ),
            array(
                $client
            ),
        );
    }

    /**
     * @dataProvider testMessageCreateForTicketProvider
     */
    public function testMessageCreateForTicket($identity)
    {
        $randId = rand(1, 100);
        $supportTicketMessage = new \Model_SupportTicketMessage();
        $supportTicketMessage->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($supportTicketMessage));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $di            = new \Box_Di();
        $di['db']      = $dbMock;
        $di['logger']  = $this->getMockBuilder('Box_Log')->getMock();
        $di['request'] = $this->getMockBuilder('Box_Request')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->messageCreateForTicket($ticket, $identity, 'Content');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    /**
     * @expectedException \Box_Exception
     */
    public function testMessageCreateForTicketIdentityException()
    {
        $randId = rand(1, 100);
        $supportTicketMessage = new \Model_SupportTicketMessage();
        $supportTicketMessage->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($supportTicketMessage));
        $dbMock->expects($this->never())
            ->method('store')
            ->will($this->returnValue($randId));

        $di            = new \Box_Di();
        $di['db']      = $dbMock;
        $di['logger']  = $this->getMockBuilder('Box_Log')->getMock();
        $di['request'] = $this->getMockBuilder('Box_Request')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->messageCreateForTicket($ticket, null, 'Content');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testPublicGetStatuses()
    {
        $result = $this->service->publicGetStatuses();
        $this->assertInternalType('array', $result);
    }

    public function testPublicFindOneByHash()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue(new \Model_SupportPTicket()));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $result = $this->service->publicFindOneByHash(sha1(uniqid()));
        $this->assertInstanceOf('Model_SupportPTicket', $result);
    }

    /**
     * @expectedException \Box_Exception
     */
    public function testPublicFindOneByHashNotFoundException()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue(null));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $client = new \Model_Client();
        $client->loadBean(new \RedBeanPHP\OODBBean());
        $client->id = rand(1, 100);

        $result = $this->service->publicFindOneByHash(sha1(uniqid()));
        $this->assertInstanceOf('Model_SupportPTicket', $result);
    }

    public function testPublicGetSearchQueryProvider()
    {
        return array(
            array(
                array(
                    'search'  => 'Query',
                    'id'      => rand(1, 100),
                    'status'  => \Model_SupportPTicket::OPENED,
                    'name'    => 'Name',
                    'email'   => 'email@example.com',
                    'subject' => 'Subject',
                    'content' => 'Content',
                )
            ),
            array(
                array(
                    'search'  => rand(1, 100),
                    'search'  => rand(1, 100),
                    'id'      => rand(1, 100),
                    'status'  => \Model_SupportPTicket::OPENED,
                    'name'    => 'Name',
                    'email'   => 'email@example.com',
                    'subject' => 'Subject',
                    'content' => 'Content',
                )
            ),
        );
    }


    /**
     * @dataProvider testPublicGetSearchQueryProvider
     */
    public function testPublicGetSearchQuery($data)
    {
        list($query, $bindings) = $this->service->publicgetSearchQuery($data);
        $this->assertInternalType('string', $query);
        $this->assertInternalType('array', $bindings);
    }

    public function testPublicCounter()
    {
        $arr    = array(
            \Model_SupportPTicket::OPENED => rand(1, 100),
            \Model_SupportPTicket::ONHOLD => rand(1, 100),
            \Model_SupportPTicket::CLOSED => rand(1, 100),
        );
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getAssoc')
            ->will($this->returnValue($arr));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->publicCounter();
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertEquals(array_sum($arr), $result['total']);
    }

    public function testPublicGetLatest()
    {
        $ticket = new \Model_SupportPTicket();
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array($ticket, $ticket)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->publicGetLatest();
        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('Model_SupportPTicket', $result[0]);
    }

    public function testPublicCountByStatus()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getCell')
            ->will($this->returnValue(rand(1, 100)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->publicCountByStatus('open');
        $this->assertInternalType('integer', $result);
    }

    public function testPublicGetExpired()
    {
        $ticket = new \Model_SupportPTicket();
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array($ticket, $ticket)));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $result = $this->service->publicGetExpired();
        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('Model_SupportPTicket', $result[0]);
    }

    public function testPublicCloseTicketProvider()
    {
        return array(
            array(new \Model_Admin()),
            array(new \Model_Guest())
        );
    }

    /**
     * @dataProvider testPublicCloseTicketProvider
     */
    public function testPublicCloseTicket($identity)
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->publicCloseTicket($ticket, $identity);
        $this->assertTrue($result);
    }

    public function testPublicAutoClose()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->publicAutoClose($ticket);
        $this->assertTrue($result);
    }

    public function testPublicRm()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue(array(new \Model_SupportPTicketMessage())));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $canned = new \Model_SupportPTicket();
        $canned->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->publicRm($canned);
        $this->assertTrue($result);
    }

    public function testPublicToApiArrayProvider()
    {
        return array(
            array(
                new \Model_SupportPTicketMessage(),
                $this->atLeastOnce()
            ),
            array(
                null,
                $this->never()
            )
        );
    }

    /**
     * @dataProvider testPublicToApiArrayProvider
     */
    public function testPublicToApiArray($findOne, $publicMessageGetAuthorDetailsCalled)
    {
        $ticketMessages = array(new \Model_SupportPTicketMessage(), new \Model_SupportPTicketMessage());

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('findOne')
            ->will($this->returnValue($findOne));
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));
        $dbMock->expects($this->atLeastOnce())
            ->method('find')
            ->will($this->returnValue($ticketMessages));

        $serviceMock = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('publicMessageToApiArray', 'publicMessageGetAuthorDetails'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('publicMessageToApiArray')
            ->will($this->returnValue(array()));
        $serviceMock->expects($publicMessageGetAuthorDetailsCalled)->method('publicMessageGetAuthorDetails')
            ->will($this->returnValue(array('name' => 'Name', 'email' => 'email#example.com')));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $serviceMock->setDi($di);

        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $serviceMock->publicToApiArray($ticket, true, new \Model_Admin());
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('author', $result);
        $this->assertArrayHasKey('messages', $result);

        $this->assertEquals(count($result['messages']), count($ticketMessages));
    }

    public function testPublicMessageGetAuthorDetailsAdmin()
    {
        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->id = rand(1, 100);

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getExistingModelById')
            ->will($this->returnValue($admin));


        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $ticketMsg = new \Model_SupportPTicketMessage();
        $ticketMsg->loadBean(new \RedBeanPHP\OODBBean());
        $ticketMsg->admin_id = rand(1, 100);

        $result = $this->service->publicMessageGetAuthorDetails($ticketMsg);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('email', $result);
    }

    public function testPublicMessageGetAuthorDetailsNotAdmin()
    {
        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $ticket->author_name  = "Name";
        $ticket->author_email = "Email@example.com";

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getExistingModelById')
            ->will($this->returnValue($ticket));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $ticketMsg = new \Model_SupportPTicketMessage();
        $ticketMsg->loadBean(new \RedBeanPHP\OODBBean());
        $ticketMsg->admin_id = null;

        $result = $this->service->publicMessageGetAuthorDetails($ticketMsg);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('email', $result);
    }

    public function testPublicMessageToApiArray()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));

        $serviceMock = $this->getMockBuilder('\Box\Mod\Support\Service')
            ->setMethods(array('publicMessageGetAuthorDetails'))->getMock();
        $serviceMock->expects($this->atLeastOnce())->method('publicMessageGetAuthorDetails')
            ->will($this->returnValue(array()));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $serviceMock->setDi($di);

        $ticketMsg = new \Model_SupportPTicketMessage();
        $ticketMsg->loadBean(new \RedBeanPHP\OODBBean());
        $ticketMsg->id = rand(1, 100);

        $result = $serviceMock->publicMessageToApiArray($ticketMsg);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('author', $result);
    }

    public function testPublicTicketCreate()
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($message));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $validatorMock = $this->getMockBuilder('\Box_Validate')->getMock();
        $validatorMock->expects($this->atLeastOnce())->method('isEmailValid');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['validator']      = $validatorMock;
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());
        $admin->id = rand(1, 100);

        $data = array(
            'email'   => 'email@example.com',
            'name'    => 'Name',
            'message' => 'Message',
            'request' => 'Request',
            'subject' => 'Subject',
        );

        $result = $this->service->publicTicketCreate($data, $admin);
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testPublicTicketUpdate()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'support_helpdesk_id' => rand(1, 100),
            'status'              => \Model_SupportTicket::OPENED,
            'subject'             => 'Subject',
            'priority'            => rand(1, 100),
        );

        $result = $this->service->publicTicketUpdate($ticket, $data);
        $this->assertTrue($result);
    }

    public function testPublicTicketReply()
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($message));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->
        method('fire');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->publicTicketReply($ticket, $admin, 'Content');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testPublicTicketReplyForGuest()
    {
        $message = new \Model_SupportTicketMessage();
        $message->loadBean(new \RedBeanPHP\OODBBean());

        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($message));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $eventMock = $this->getMockBuilder('\Box_EventManager')->getMock();
        $eventMock->expects($this->atLeastOnce())->method('fire');

        $di                   = new \Box_Di();
        $di['db']             = $dbMock;
        $di['logger']         = $this->getMockBuilder('Box_Log')->getMock();
        $di['request']        = $this->getMockBuilder('Box_Request')->getMock();
        $di['events_manager'] = $eventMock;
        $this->service->setDi($di);

        $ticket = new \Model_SupportPTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());
        $ticket->hash = sha1(uniqid());

        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->publicTicketReplyForGuest($ticket, 'Message');
        $this->assertInternalType('string', $result);
        $this->assertEquals(strlen($result), 40);
    }

    public function testHelpdeskUpdate()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $helpdesk = new \Model_SupportHelpdesk();
        $helpdesk->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'name'        => 'Name',
            'email'       => 'email@example.com',
            'can_reopen'  => 1,
            'close_after' => rand(1, 100),
            'signature'   => 'Signature',
        );

        $result = $this->service->helpdeskUpdate($helpdesk, $data);
        $this->assertTrue($result);
    }

    public function testHelpdeskCreate()
    {
        $randId = rand(1, 100);
        $helpDeskModel = new \Model_SupportHelpdesk();
        $helpDeskModel->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($helpDeskModel));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportHelpdesk();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'name'        => 'Name',
            'email'       => 'email@example.com',
            'can_reopen'  => 1,
            'close_after' => rand(1, 100),
            'signature'   => 'Signature',
        );

        $result = $this->service->helpdeskCreate($data);
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testCannedGetSearchQuery()
    {
        $data = array(
            'search' => 'query',
        );

        list($query, $bindings) = $this->service->cannedGetSearchQuery($data);
        $this->assertInternalType('string', $query);
        $this->assertInternalType('array', $bindings);
    }

    public function testCannedGetGroupedPairs()
    {
        $pairs = array(
            0 => array(
                'id'      => 1,
                'r_title' => 'R  Title',
                'c_title' => 'General',
            )
        );

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getAll')
            ->will($this->returnValue($pairs));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $this->service->setDi($di);

        $expected = array(
            'General' =>
                array(
                    1 => 'R  Title',
                ),
        );

        $result = $this->service->cannedGetGroupedPairs();
        $this->assertInternalType('array', $result);
        $this->assertEquals($result, $expected);
    }

    public function testCannedRm()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $canned = new \Model_SupportPr();
        $canned->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedRm($canned);
        $this->assertTrue($result);
    }

    public function testCannedToApiArray()
    {
        $category = new \Model_SupportPrCategory();
        $category->loadBean(new \RedBeanPHP\OODBBean());
        $category->id    = rand(1, 100);
        $category->title = 'General';

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue($category));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);


        $canned = new \Model_SupportPr();
        $canned->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedToApiArray($canned);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('category', $result);
        $this->assertInternalType('array', $result['category']);
        $this->assertArrayHasKey('id', $result['category']);
        $this->assertArrayHasKey('title', $result['category']);
    }

    public function testCannedToApiArrayCategotyNotFound()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));
        $dbMock->expects($this->atLeastOnce())
            ->method('load')
            ->will($this->returnValue(null));

        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);


        $canned = new \Model_SupportPr();
        $canned->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedToApiArray($canned);
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('category', $result);
        $this->assertEquals($result['category'], array());
    }

    public function testCannedCategoryGetPairs()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('getAssoc')
            ->will($this->returnValue(array(0 => 'General')));


        $di       = new \Box_Di();
        $di['db'] = $dbMock;
        $this->service->setDi($di);

        $this->service->setDi($di);

        $note = new \Model_SupportTicketNote();
        $note->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedCategoryGetPairs();
        $this->assertInternalType('array', $result);
    }

    public function testCannedCategoryRm()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('trash')
            ->will($this->returnValue(null));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $canned = new \Model_SupportPrCategory();
        $canned->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedCategoryRm($canned);
        $this->assertTrue($result);
    }

    public function testCannedCategoryToApiArray()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->will($this->returnValue(array()));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $canned = new \Model_SupportPrCategory();
        $canned->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedCategoryToApiArray($canned);
        $this->assertInternalType('array', $result);
    }

    public function testCannedCreate()
    {
        $randId = rand(1, 100);
        $helpDeskModel = new \Model_SupportHelpdesk();
        $helpDeskModel->loadBean(new \RedBeanPHP\OODBBean());
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($helpDeskModel));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $settingsServiceMock = $this->getMockBuilder('\Box\Mod\Email\Service')
            ->setMethods(array('checkLimits'))->getMock();
        $settingsServiceMock->expects($this->atLeastOnce())->method('checkLimits')
            ->will($this->returnValue(null));

        $di                = new \Box_Di();
        $di['mod_service'] = $di->protect(function () use ($settingsServiceMock) {
            return $settingsServiceMock;
        });
        $di['db']          = $dbMock;
        $di['logger']      = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $ticket = new \Model_SupportHelpdesk();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'name'        => 'Name',
            'email'       => 'email@example.com',
            'can_reopen'  => 1,
            'close_after' => rand(1, 100),
            'signature'   => 'Signature',
        );

        $result = $this->service->cannedCreate($data, rand(1, 100), 'Content');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testCannedUpdate()
    {
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue(rand(1, 100)));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $model = new \Model_SupportPr();
        $model->loadBean(new \RedBeanPHP\OODBBean());

        $data = array(
            'category_id' => rand(1, 100),
            'title'       => 'email@example.com',
            'content'     => 1,
        );

        $result = $this->service->cannedUpdate($model, $data);
        $this->assertTrue($result);
    }

    public function testCannedCategoryCreate()
    {
        $randId = rand(1, 100);
        $supportPrCategoryModel = new \Model_SupportPrCategory();
        $supportPrCategoryModel->loadBean(new \RedBeanPHP\OODBBean());

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($supportPrCategoryModel));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $data = array(
            'name'        => 'Name',
            'email'       => 'email@example.com',
            'can_reopen'  => 1,
            'close_after' => rand(1, 100),
            'signature'   => 'Signature',
        );

        $result = $this->service->cannedCategoryCreate($data, rand(1, 100), 'Content');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testCannedCategoryUpdate()
    {
        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $model = new \Model_SupportPrCategory();
        $model->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->cannedCategoryUpdate($model, 'Title');
        $this->assertTrue($result);
    }

    public function testNoteCreate()
    {
        $randId = rand(1, 100);
        $supportPrCategoryModel = new \Model_SupportPrCategory();
        $supportPrCategoryModel->loadBean(new \RedBeanPHP\OODBBean());

        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('dispense')
            ->will($this->returnValue($supportPrCategoryModel));
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $data = array(
            'name'        => 'Name',
            'email'       => 'email@example.com',
            'can_reopen'  => 1,
            'close_after' => rand(1, 100),
            'signature'   => 'Signature',
        );

        $admin = new \Model_Admin();
        $admin->loadBean(new \RedBeanPHP\OODBBean());

        $ticket = new \Model_SupportTicket();
        $ticket->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->noteCreate($ticket, $admin, 'Note');
        $this->assertInternalType('integer', $result);
        $this->assertEquals($result, $randId);
    }

    public function testTicketTaskComplete()
    {
        $randId = rand(1, 100);
        $dbMock = $this->getMockBuilder('\Box_Database')->disableOriginalConstructor()->getMock();
        $dbMock->expects($this->atLeastOnce())
            ->method('store')
            ->will($this->returnValue($randId));

        $di           = new \Box_Di();
        $di['db']     = $dbMock;
        $di['logger'] = $this->getMockBuilder('Box_Log')->getMock();
        $this->service->setDi($di);

        $model = new \Model_SupportTicket();
        $model->loadBean(new \RedBeanPHP\OODBBean());

        $result = $this->service->ticketTaskComplete($model);
        $this->assertTrue($result);
    }
}
 