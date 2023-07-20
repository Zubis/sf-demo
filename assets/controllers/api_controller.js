import { Controller } from '@hotwired/stimulus';
import axios from 'axios';

export default class extends Controller {
    
    static values = {
        apiUrl: String
    }

    sendPost(event) {
        event.preventDefault();
        console.log('sending post!');

        const randomString = (Math.random() + 1).toString(36).substring(7);

        axios.post(
            this.apiUrlValue,
            {
                title: 'test',
                slug: 'test',
                summary: 'test',
                content: 'blablabla qskdj qsdoijqsd',
                author: {
                    fullname: 'toto',
                    username: 'tata-'+randomString,
                    email: randomString + '@test.local',
                    password: 'myPassword',
                    roles: ['ROLE_USER'],
                }
            },
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        )
        .then((response) => {
            console.log(response);
            
            this.element.querySelector('.result').textContent = response.data.response;;

        });
    }
}