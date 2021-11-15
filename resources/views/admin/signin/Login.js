import React from 'react';
import ReactDOM from 'react-dom';
import {useNavigate} from 'react-router-dom';
import axios from 'axios';

class Login extends React.Component {
  state = {
    email:'',
    password:'',
    validator:[],
    auth_error:''
  }

  handleInput = (e) => {
    this.setState({[e.target.name] : e.target.value});
  }

  login = async (e) => {
    e.preventDefault();
    const response = await axios.post('/admin/signin', this.state);
    
    if (response.data.status==200) 
    {
      useNavigate("/admin/dashboard");
    }else if(response.data.status=='auth_error')
    {
      this.setState({
        auth_error: response.data.auth_error,
      });
    }else
    {
      this.setState({
        validator: response.data.validator,
      });
    }
    
  }
 
    render(){
        return (

          <div className="container text-center mt-5">
            <form className="fff" onSubmit={this.login}>
              <div className="border border-success col-4 offset-4 p-1">
                <img className="mb-4 img-thumbnail rounded-circle mx-auto d-block" src="#" alt="" width="72" height="72" />
                  {this.state.auth_error &&
                    <div className="alert alert-danger" role="alert">
                      {this.state.auth_error}
                    </div>
                  }
                <div className="mb-3 form-floating text-left">
                  <input name="email" value={this.state.email} onChange={this.handleInput} type="email" className="form-control" id="floatingInput" placeholder="name@example.com" />
                  <label htmlFor="floatingInput">Email address</label>
                  <span className="text-danger pl-1">{this.state.validator.email}</span>
                </div>
                <div className="mb-3 form-floating text-left">
                  <input name="password" value={this.state.password} onChange={this.handleInput} type="password" className="form-control" id="floatingPassword" placeholder="Password"/>
                  <label htmlFor="floatingPassword">Password</label>
                  <span className="text-danger pl-1">{this.state.validator.password}</span>
                </div>
                <div className="row">
                  <div className="col mb-3">
                    <label>
                      <input type="checkbox" value="remember-me" /> Remember me
                    </label>
                  </div>
                  <div className="col mb-3">
                    <label>
                      <a href="#">Forgot password?</a>
                    </label>
                  </div>
                </div>
                <div className="form-floating">
                  <button className="btn btn-lg btn-primary col-12" type="submit">Sign in</button>
                </div>
                <p className="mt-3 mb-3 text-muted">&copy; You grow, we grow!</p>
              </div>
            </form>
          </div>
        );
    } 
}

export default Login;