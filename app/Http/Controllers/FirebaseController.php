<?php

namespace FridgeCodeWebApp\Http\Controllers;

require 'C:\inetpub\wwwroot\fridgeCodeWebApp\vendor\autoload.php';

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase\Auth;


class FirebaseController extends Controller
{
    //
    public function index() {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/firebaseJson.json')
            ->withDatabaseUri('https://fridgecodemobileapp.firebaseio.com/');
        $database = $firebase->createDatabase();

        $data = $database
            ->getReference('product')
            ->getValue();

        return view('home', compact('data'));
    }

    public function logIn(Request $request) {
        if(isset($_POST['loginBtn'])){
            /*$firebase = (new Factory)
                ->withServiceAccount(__DIR__.'/firebaseJson.json')
                ->withDatabaseUri('https://fridgecodemobileapp.firebaseio.com/');
            
            $auth = $firebase->createAuth();

            $email = $_POST['loginUsername'];
            $pass = $_POST['loginPass'];
            

            $user = $auth->signInWithEmailAndPassword($email, $pass);
            
            return redirect('home');*/

            $userId = $_POST['auid'];

            

            /*if(!($user = $auth->signInWithEmailAndPassword($email, $pass))){
                return redirect('home')->with('nem ment');
            }
            else{
                return redirect('home');
            }*/

            /*try{
                $user = $auth->signInWithEmailAndPassword($email, $pass);

                return redirect('home');
            }
            catch (FirebaseAuthInvalidCredentialsException $e){
                return redirect('home')->with('szar a credential');
            }
            catch(FirebaseAuthInvalidUserException $e){
                return redirect('home')->with('szar a user');
            }
            catch(FirebaseAuthUserCollisionException $e){
                return redirect('home')->with('szar a collision');
            }
            catch(FirebaseAuthException $e){
                return redirect('home')->with('szar az auth');
            }
            catch(Exception $e){
                return redirect('home')->with('exception');
            }
            catch(Throwable $e){
                return redirect('home')->with('throwable');
            }
            catch(Kreait\Firebase\Auth\SignIn\FailedToSignIn $e){
                return redirect('home')->with('nem ment');
            }*/            
        }
    }

    public function reg(Request $request) {
        if(isset($_POST['regBtn'])){
            $firebase = (new Factory)
                ->withServiceAccount(__DIR__.'/firebaseJson.json')
                ->withDatabaseUri('https://fridgecodemobileapp.firebaseio.com/');
            
            $auth = $firebase->createAuth();

            $email = $_POST['regEmail'];

            $pass = $_POST['regPass'];
            $pass2 = $_POST['regPass2'];

            if($pass == $pass2){
                $user = $auth->createUserWithEmailAndPassword($email, $pass);

                return redirect('home');
            }
        }
    }
}
