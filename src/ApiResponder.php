<?php namespace Tzookb\ApiResponder;


use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * This awesome class written by: tzookb
 * Date: 24/06/15
 */
class ApiResponder {

    protected $data;
    protected $errors;
    protected $meta;
    protected $ref;
    protected $code;
    protected $type;
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    public function __construct(ResponseFactory $responseFactory) {
        $this->reset();
        $this->responseFactory = $responseFactory;
    }

    /**
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function respond()
    {
        $result = [];


        if ($this->data) {
            $result['data'] = $this->prepData($this->data);
        }

        if ($this->errors) {
            $result['errors'] = $this->prepData($this->errors);
        }

        if ($this->meta) {
            $result['meta'] = $this->prepData($this->meta);
        }

        $result['ref'] = $this->ref;

        return $this->process($result);
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function setErrors($data)
    {
        $this->errors = $data;
        return $this;
    }

    public function setMeta($data)
    {
        $this->meta = $data;
        return $this;
    }

    public function setRef($data)
    {
        $this->ref = $data;
        return $this;
    }

    public function setCode($data)
    {
        $this->code= $data;
        return $this;
    }

    public function setType($data)
    {
        return $this;
        //currently only json....
        $this->type = $data;
        return $this;
    }

    protected function prepData($data)
    {
        return $data;
    }

    protected function process($data) {
        if ('json' == $this->type) {
            $this->responseFactory->json($data, $this->code);
        }

        throw new \Exception('no processer for api maker');
    }

    protected function reset()
    {
        $this->data = null;
        $this->errors = null;
        $this->meta = null;
        $this->ref = 0;
        $this->code = 200;
        $this->type = 'json';
    }
}