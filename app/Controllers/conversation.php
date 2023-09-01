<?php $url = 'https://hooks.slack.com/services/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';

        $curl = curl_init();

        $fields = array(

            'text' => 'welcome to the codeigniter john ',

        );

        $json_string = json_encode($fields);

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_POST, TRUE);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );

        $data = curl_exec($curl);

        curl_close($curl);