<?php

        if ($this->peek()['type'] == 'PRINT') { //switch des diff function
            $this->pop();
            $value = $this->expect('STRING');
            $this->expect('SEMICOLON');
            return array('type' => 'PRINT', 'value' => $value);
        }
    }