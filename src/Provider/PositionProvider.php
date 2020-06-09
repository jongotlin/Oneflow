<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Position;

class PositionProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return Position[]
     */
    public function all()
    {
        /*
         * {"collection":[{"account":{"country":"SE","created":"2020-04-30T11:40:19+0000","created_ts":1588246819,"id":395593,"is_customer":false,"is_demo":false,"locked":0,"logo_url":null,"name":"LeanLink AB","orgnr":null,"phone_number":null,"trial":false,"trial_end_timestamp":"2020-05-14T11:40:19+0000","trial_end_timestamp_ts":1589456419,"updated":"2020-05-04T10:24:05+0000","updated_ts":1588587845},"acl":{"position:group:create":"allow","position:group:remove":"allow","position:message:template:create":"allow","position:message:template:view":"allow","position:mfa":"deny","position:mfa:email":"deny","position:mfa:sms":"deny","position:setting:update":"allow","position:update:active":"allow","position:update:email":"deny","position:update:fullname":"allow","position:update:language":"allow","position:update:password":"deny","position:update:phone_number":"allow","position:update:signature":"allow","position:update:title":"allow","position:update:user_role":"allow"},"active":1,"created":"2020-04-30T11:40:19+0000","created_ts":1588246819,"email":"fredrik.nordell++@leanlink.io","fullname":"Fredrik Nordell","groups":[{"account":{"id":395593},"created":"2020-04-30T11:40:19+0000","created_ts":1588246819,"id":231189,"name":"oneflow-users","system_type":"directory","updated":null,"updated_ts":null}],"has_mfa":false,"has_password":true,"id":920174,"language":"sv","last_visit_timestamp":"2020-05-25T12:14:48+0000","last_visit_timestamp_ts":1590408888,"login_timestamp":"2020-05-14T16:49:14+0000","login_timestamp_ts":1589474954,"mfa_channel":null,"phone_number":null,"puid":"e9acbc65-4389-4124-b459-f7747a655425","register_timestamp":"2020-05-04T10:24:05+0000","register_timestamp_ts":1588587845,"signature":null,"state":3,"title":null,"updated":"2020-05-25T12:14:48+0000","updated_ts":1590408888,"user":{"created":"2020-04-30T11:40:19+0000","created_ts":1588246819,"email":"fredrik.nordell++@leanlink.io","id":927898,"last_visit_timestamp":"2020-05-25T12:14:48+0000","last_visit_timestamp_ts":1590408888,"login_timestamp":"2020-05-14T16:49:14+0000","login_timestamp_ts":1589474954,"puid":"e9acbc65-4389-4124-b459-f7747a655425","register_timestamp":"2020-05-04T10:24:05+0000","register_timestamp_ts":1588587845,"state":3,"updated":null,"updated_ts":null},"user_role":"administrator"}],"count":1}
         */
        $data = $this->get('positions/');

        $positions = [];
        foreach ($data['collection'] as $row) {
            $position = new Position();
            $position->setId($row['id']);
            $position->setName($row['fullname']);

            $positions[] = $position;
        }

        return $positions;
    }

    /**
     * @param string $email
     *
     * @return Position|null
     */
    public function findOneByEmail(string $email): ?Position
    {
        $data = $this->get('positions/?email=' . urlencode($email));

        foreach ($data['collection'] as $row) {
            $position = new Position();
            $position->setId($row['id']);
            $position->setName($row['fullname']);

            return $position;
        }

        return null;
    }
}
