<?php

namespace JGI\Oneflow\Provider;

class PingProvider extends BaseProvider implements ProviderInterface
{
    public function ping(): int
    {
        try {
            $data = $this->get('ping');
        } catch (\Exception $exception) {
            return 401;
        }
        if (count($data) == 0) {
            return 200;
        }

        return (int) $data['status_code'];
    }
}
