<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdatePasswordUserRequest;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * config
     *
     * @var config
     */
    protected $config;

    /**
     * TokenClient constructor.
     */
    public function __construct()
    {
        $this->config = config('services.dentasoft');
    }

    public function index()
    {
        $this->authorize('show-user', User::class);

        $users = $this->getUserList();
        unset($users['itemCount']);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
    	$this->authorize('show-user', User::class);

        $users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }
        $user = $this->findById($users, (int) $id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }

        return view('users.show',compact('user'));
    }
    

    public function create()
    {
        $this->authorize('create-user', User::class);

        $roles = Role::all();

        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('create-user', User::class);
        $res = $this->createUser($request);
        if($res['response']['code'] !== 200) {
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect()->route('user.create');
        }

        $this->flashMessage('check', 'User successfully added!', 'success');

        return redirect()->route('user');
    }

    public function edit($id)
    {
    	$this->authorize('edit-user', User::class);

    	$users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }
        $user = $this->findById($users, (int) $id);
    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }

        return view('users.edit',compact('user'));
    }

    public function update(Request $request)
    {
    	$this->authorize('edit-user', User::class);

    	$users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user.edit', $request['Id']);
        }
        $user = $this->findById($users, (int) $request['Id']);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user.edit', $request['Id']);
        }

        $res = $this->updateUserClient($request);
        if($res['response']['code'] !== 200) {
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect()->route('user.edit', $request['Id']);
        }

        $this->flashMessage('check', 'User updated successfully!', 'success');

        return redirect()->route('user.edit', $request['Id']);
    }

    public function updatePassword(UpdatePasswordUserRequest $request,$id)
    {
    	$this->authorize('edit-user', User::class);

    	$user = User::find($id);

        if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }

        $request->merge(['password' => bcrypt($request->get('password'))]);

        $user->update($request->all());

        $this->flashMessage('check', 'User password updated successfully!', 'success');

        return redirect()->route('user');
    }

    public function updateStatus($id)
    {
        $users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user', $id);
        }
        $user = $this->findById($users, (int) $id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user', $id);
        }

        $res = $this->updateStatusUserClient($user);
        if($res['response']['code'] !== 200) {
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect()->route('user');
        }

        $this->flashMessage('check', 'User updated status successfully!', 'success');
        return redirect()->route('user');
    }

    public function updateRole($id)
    {
        $users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user', $id);
        }
        $user = $this->findById($users, (int) $id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user', $id);
        }

        $res = $this->updateRoleUserClient($user);
        if(empty($res) || $res['response']['code'] !== 200) {
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect()->route('user');
        }

        $this->flashMessage('check', 'User updated status successfully!', 'success');
        return redirect()->route('user');
    }

    public function editPassword($id)
    {
    	$this->authorize('edit-user', User::class);

    	$user = User::find($id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }

        return view('users.edit_password',compact('user'));
    }

    public function destroy($email, $company_code)
    {
        $this->authorize('destroy-user', User::class);
        $res = $this->deleteUser($email, $company_code);
        if($res['response']['code'] !== 200){
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user');
        }

        $this->flashMessage('check', 'User successfully deleted!', 'success');

        return redirect()->route('user');
    }

    public function codeVerify(Request $request)
    {
        $email = $request['email'];
        return view('users.code-verify', compact('email'));
    }

    public function sendVerifyCode(Request $request)
    {
        $res = $this->sendVerifyCodeClient($request);
        if($res['response']['code'] !== 200){
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect('/user/code-verify?email='.$request['email']);
        }

        $this->flashMessage('check', 'User successfully sent verification code!', 'success');

        return redirect()->route('user');
    }

    public function resendVerifyCode(Request $request)
    {
        $res = $this->resendVerifyCodeClient($request);
        if($res['response']['code'] !== 200){
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect()->route('user');
        }

        $this->flashMessage('check',  $res['response']['message'], 'success');

        return redirect()->route('user');
    }

    public function getUserList()
    {
        $client = new Client();
        $response = $client->get($this->config['host'].'/api/Users/getUserList.php', [
            'query' => [
                'email' => $this->config['email'],
                'api_key' => $this->config['api_key']
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['response']['data'] ?? [];
    }

    public function createUser($request)
    {
        $client = new Client();
        $options = [
            'multipart' => [
                [
                    'name' => 'firstName',
                    'contents' => $request['firstName']
                ],
                [
                    'name' => 'lastName',
                    'contents' => $request['lastName']
                ],
                [
                    'name' => 'email',
                    'contents' => $request['email']
                ],
                [
                    'name' => 'password',
                    'contents' => $request['password']
                ],
                [
                    'name' => 'phone',
                    'contents' => $request['phone']
                ],
                [
                    'name' => 'role',
                    'contents' => $request['role']
                ],
                [
                    'name' => 'site_url',
                    'contents' => $request['site_url']
                ],
                [
                    'name' => 'site_email',
                    'contents' => 'dentistejacob@dentasoft.be'
                ],
                [
                    'name' => 'site_phone',
                    'contents' => $request['site_phone']
                ],
                [
                    'name' => 'site_name',
                    'contents' => $request['site_name']
                ],
                [
                    'name' => 'language',
                    'contents' => $request['language']
                ],
                [
                    'name' => 'company_code',
                    'contents' => $request['company_code']
                ]
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/Create.php', $options);

        return json_decode($response->getBody(), true);
    }

    public function deleteUser($email, $company_code)
    {
        $client = new Client();
        $options = [
            'query' => [
                'email' => $this->config['email'],
                'api_key' => $this->config['api_key']
            ],
            'multipart' => [
                [
                    'name' => 'email',
                    'contents' => $email
                ],
                [
                    'name' => 'company_code',
                    'contents' => $company_code
                ]
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/deleteUser.php', $options);

        return json_decode($response->getBody(), true);
    }

    public function editSite($id)
    {
    	$this->authorize('edit-user', User::class);

    	$users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user.show', $id);
        }
        $user = $this->findById($users, (int) $id);
    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user.site.edit', $id);
        }

        return view('users.edit-site', compact('user'));
    }

    public function updateSite(Request $request, $user_id)
    {
    	$this->authorize('edit-user', User::class);

    	$users = $this->getUserList();
        unset($users['itemCount']);
        if (!$users) {
            $this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user.show', $user_id);
        }
        $user = $this->findById($users, (int) $user_id);

    	if(!$user){
        	$this->flashMessage('warning', 'User not found!', 'danger');
            return redirect()->route('user.show', $user_id);
        }

        $res = $this->updateUserClient($request);
        if($res['response']['code'] !== 200) {
            $this->flashMessage('warning', $res['response']['message'], 'danger');
            return redirect()->route('user.show', $user_id);
        }

        $this->flashMessage('check', 'Site User updated successfully!', 'success');

        return redirect()->route('user.show', $user_id);
    }

    public function updateStatusUserClient($user)
    {
        $client = new Client();
        $options = [
            'query' => [
                'email' => $this->config['email'],
                'api_key' => $this->config['api_key']
            ],
            'multipart' => [
                [
                    'name' => 'email',
                    'contents' => $user['Email']
                ],
                [
                    'name' => 'company_code',
                    'contents' => $user['company_code']
                ],
                [
                    'name' => 'status',
                    'contents' => $user['Status'] === 'Inactive' ? 'Active' : 'Inactive'
                ]
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/update_user_status.php', $options);

        return json_decode($response->getBody(), true);
    }

    public function updateRoleUserClient($user)
    {
        $client = new Client();
        $options = [
            'query' => [
                'email' => $this->config['email'],
                'api_key' => $this->config['api_key']
            ],
            'multipart' => [
                [
                    'name' => 'email',
                    'contents' => $user['Email']
                ],
                [
                    'name' => 'company_code',
                    'contents' => $user['company_code']
                ],
                [
                    'name' => 'role',
                    'contents' => $user['Role'] === 'User' ? 'Admin' : 'User'
                ]
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/updateRole.php', $options);

        return json_decode($response->getBody(), true);
    }

    public function updateUserClient($request)
    {
        $client = new Client();
        $options = [
            'query' => [
                'email' => $this->config['email'],
                'api_key' => $this->config['api_key']
            ],
            'multipart' => [
                [
                    'name' => 'site_id',
                    'contents' => $request['site_id']
                ],
                [
                    'name' => 'site_name',
                    'contents' => $request['site_name']
                ],
                [
                    'name' => 'site_url',
                    'contents' => $request['site_url']
                ],
                [
                    'name' => 'site_phone',
                    'contents' => $request['site_phone']
                ]
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/updateSite.php', $options);

        return json_decode($response->getBody(), true);
    }

    public function sendVerifyCodeClient(Request $request)
    {
        $client = new Client();
        $options = [
            'query' => [
                'email' => $request['email']
            ],
            'multipart' => [
                [
                    'name' => 'code',
                    'contents' => $request['code']
                ],
                [
                    'name' => 'company_code',
                    'contents' => $request['company_code']
                ]
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/EmailVerification.php', $options);

        return json_decode($response->getBody(), true);
    }

    public function resendVerifyCodeClient(Request $request)
    {
        $client = new Client();
        $options = [
            'query' => [
                'email' => $request['email']
            ]
        ];

        $response = $client->post($this->config['host'].'/api/Users/resentCode.php', $options);

        return json_decode($response->getBody(), true);
    }

    function findById($data, $id) {
        foreach ($data as $key => $item) {
            if ($item["Id"] === $id) {
                return $item;
            }
        }
        return null;
    }
}
