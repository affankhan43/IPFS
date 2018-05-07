<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/lianglingjiang/pen/yMxryN?depth=everything&order=popularity&page=13&q=device&show_forks=false" />

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
<style class="cp-pen-styles">* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
html,
body {
  background: #eff2f7;
  font-family: Helvetica Neue, Helvetica, PingFang SC, Hiragino Sans GB, Microsoft YaHei, SimSun, sans-serif;
}
ul,
ol,
li {
  list-style-type: none;
}
a {
  text-decoration: none;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  margin: 0;
  padding: 0;
  font-weight: normal;
}
.shake {
  -webkit-animation-name: shake;
  -moz-animation-name: shake;
  -o-animation-name: shake;
  -ms-animation-name: shake;
  animation-name: shake;
  -webkit-animation-duration: 450ms;
  -moz-animation-duration: 450ms;
  -o-animation-duration: 450ms;
  -ms-animation-duration: 450ms;
  animation-duration: 450ms;
}
.device-list {
  width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -moz-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: box;
  display: flex;
  -webkit-box-orient: horizontal;
  -moz-box-orient: horizontal;
  -o-box-orient: horizontal;
  -webkit-flex-direction: row;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-lines: multiple;
  -moz-box-lines: multiple;
  -o-box-lines: multiple;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding: 20px;
}
.ui-card {
  display: -webkit-box;
  display: -moz-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: box;
  display: flex;
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
  -o-box-orient: vertical;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -moz-box-pack: center;
  -o-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  width: 300px;
  height: 360px;
  background: #fff;
  border: 1px solid #dfe5ef;
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  margin: 20px;
  -webkit-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.07);
  box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.07);
  cursor: pointer;
  -webkit-transition: 0.5s;
  -moz-transition: 0.5s;
  -o-transition: 0.5s;
  -ms-transition: 0.5s;
  transition: 0.5s;
}
.ui-card:hover {
  -webkit-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.15);
  box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.15);
}
.ui-card .toggle {
  position: absolute;
  top: 10px;
  right: 10px;
}
.ui-card section {
  width: 100%;
  height: 100%;
  position: absolute;
  -webkit-transition: all 200ms ease-in-out;
  -moz-transition: all 200ms ease-in-out;
  -o-transition: all 200ms ease-in-out;
  -ms-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
.ui-card .content {
  left: 0;
}
.ui-card .toggle i {
  color: #8492a6;
  -webkit-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -o-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -ms-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
}
.ui-card.sidebar-open .toggle i {
  color: #324057;
  -webkit-transform: rotateZ(180deg);
  -moz-transform: rotateZ(180deg);
  -o-transform: rotateZ(180deg);
  -ms-transform: rotateZ(180deg);
  transform: rotateZ(180deg);
}
.ui-card .sidebar {
  left: 100%;
  background: #fff;
  -webkit-box-shadow: none;
  box-shadow: none;
  -webkit-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -o-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -ms-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  overflow: hidden;
}
.ui-card.sidebar-open .content {
  left: -10%;
}
.ui-card.sidebar-open .sidebar {
  left: 10%;
  -webkit-box-shadow: 0px 0px 300px 100px rgba(0,0,0,0.7);
  box-shadow: 0px 0px 300px 100px rgba(0,0,0,0.7);
}
.ui-card nav {
  width: 90%;
  padding-top: 40px;
}
.ui-card nav li {
  border-bottom: 1px solid #eff2f7;
  font-weight: 200;
  letter-spacing: 0.05em;
}
.ui-card nav li i {
  display: inline-block;
  width: 30px;
}
.ui-card nav li a {
  display: block;
  padding: 20px;
  padding-left: 30px;
  color: #8492a6;
  border-left: 4px solid transparent;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  -ms-transition: 0.3s;
  transition: 0.3s;
}
.ui-card nav li a:hover {
  border-left: 4px solid #20a0ff;
  padding-left: 26px;
  color: #324057;
}
.ui-card .disconnect {
  left: 0px;
}
.ui-card .disconnect,
.ui-card .reauth {
  width: 90%;
  height: 52px;
  text-align: center;
  position: absolute;
  bottom: 0px;
  -webkit-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -moz-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -o-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  -ms-transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
  transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
}
.ui-card .btn {
  font-size: 0.8em;
}
.ui-card .btn-disconnect {
  color: #ff4949;
  padding: 10px 30px;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  -ms-transition: 0.3s;
  transition: 0.3s;
}
.ui-card .btn-disconnect:hover {
  color: #fff;
  background-color: #ff4949;
  border-radius: 6px;
}
.ui-card .reauth {
  padding-top: 20px;
  left: 100%;
}
.ui-card .reauth h3 {
  font-size: 15px;
  margin-bottom: 7px;
  color: #ff4949;
}
.ui-card .reauth input {
  border-radius: 4px;
  border: 1px solid #c2c9d3;
  padding: 5px;
  margin-bottom: 7px;
}
.ui-card .reauth input:focus {
  outline: none;
  border: 2px solid #20a0ff;
  margin-top: -1px;
  margin-bottom: 6px;
}
.ui-card .btn-cancel {
  color: #aebdd7;
}
.ui-card .sidebar.reauth-toggled .disconnect {
  left: -100%;
}
.ui-card .sidebar.reauth-toggled .reauth {
  left: 0px;
}
.ui-card .masthead {
  display: -webkit-box;
  display: -moz-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: box;
  display: flex;
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
  -o-box-orient: vertical;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -moz-box-pack: center;
  -o-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  width: 100%;
  height: 100px;
  position: relative;
  margin-top: 70px;
}
.ui-card .masthead h1 {
  height: 100px;
  color: #324057;
  line-height: 72px;
  text-align: center;
  font-weight: 300;
  font-size: 28px;
  letter-spacing: 0.05em;
}
.ui-card .masthead .device-version {
  text-align: center;
  color: #8492a6;
  font-size: 14px;
  font-weight: 300;
  letter-spacing: 0.05em;
}
.ui-card .device-icon {
  text-align: center;
}
.ui-card .device-info {
  width: 100%;
  margin-top: 30px;
  position: absolute;
  bottom: 50px;
}
.ui-card .device-icon i {
  color: #324057;
  font-size: 28px;
}
.ui-card .device-space {
  width: 100%;
  height: 60px;
  text-align: center;
}
.ui-card .device-space h3 {
  color: #8492a6;
  font-size: 14px;
  margin-bottom: 15px;
  font-weight: 300;
  letter-spacing: 0.05em;
}
.ui-card .available-space {
  background: #eff2f7;
  width: 80%;
  margin: 0 auto;
  height: 10px;
  position: relative;
  border-radius: 20px;
  overflow: hidden;
}
.ui-card .used-space--photos,
.ui-card .used-space--videos,
.ui-card .used-space--system {
  height: 100%;
  position: absolute;
  border-radius: 20px;
}
.ui-card .used-space--photos {
  width: 70%;
  background: #13ce66;
}
.ui-card .used-space--videos {
  width: 30%;
  background: #f7ba2a;
}
.ui-card .used-space--system {
  background: #9b59b6;
}
.ui-card .device-legend {
  text-align: center;
  font-size: 11px;
  letter-spacing: 0.04em;
  font-weight: 200;
}
.ui-card .device-legend li {
  display: inline-block;
  margin-right: 15px;
  color: #8492a6;
}
.ui-card .device-legend li:last-child {
  margin-right: 0px;
}
.ui-card .device-legend i {
  display: inline-block;
  position: relative;
  top: -1px;
  font-size: 9px;
  margin-right: 3px;
}
.ui-card .device-legend i.system {
  color: #9b59b6;
}
.ui-card .device-legend i.photos {
  color: #13ce66;
}
.ui-card .device-legend i.videos {
  color: #f7ba2a;
}
@-moz-keyframes shake {
  0% {
    -webkit-transform: translateX(7px);
    -moz-transform: translateX(7px);
    -o-transform: translateX(7px);
    -ms-transform: translateX(7px);
    transform: translateX(7px);
  }
  15% {
    -webkit-transform: translateX(-7px);
    -moz-transform: translateX(-7px);
    -o-transform: translateX(-7px);
    -ms-transform: translateX(-7px);
    transform: translateX(-7px);
  }
  30% {
    -webkit-transform: translateX(5px);
    -moz-transform: translateX(5px);
    -o-transform: translateX(5px);
    -ms-transform: translateX(5px);
    transform: translateX(5px);
  }
  45% {
    -webkit-transform: translateX(-5px);
    -moz-transform: translateX(-5px);
    -o-transform: translateX(-5px);
    -ms-transform: translateX(-5px);
    transform: translateX(-5px);
  }
  60% {
    -webkit-transform: translateX(3px);
    -moz-transform: translateX(3px);
    -o-transform: translateX(3px);
    -ms-transform: translateX(3px);
    transform: translateX(3px);
  }
  75% {
    -webkit-transform: translateX(-3px);
    -moz-transform: translateX(-3px);
    -o-transform: translateX(-3px);
    -ms-transform: translateX(-3px);
    transform: translateX(-3px);
  }
  100% {
    -webkit-transform: translateX(0px);
    -moz-transform: translateX(0px);
    -o-transform: translateX(0px);
    -ms-transform: translateX(0px);
    transform: translateX(0px);
  }
}
@-webkit-keyframes shake {
  0% {
    -webkit-transform: translateX(7px);
    -moz-transform: translateX(7px);
    -o-transform: translateX(7px);
    -ms-transform: translateX(7px);
    transform: translateX(7px);
  }
  15% {
    -webkit-transform: translateX(-7px);
    -moz-transform: translateX(-7px);
    -o-transform: translateX(-7px);
    -ms-transform: translateX(-7px);
    transform: translateX(-7px);
  }
  30% {
    -webkit-transform: translateX(5px);
    -moz-transform: translateX(5px);
    -o-transform: translateX(5px);
    -ms-transform: translateX(5px);
    transform: translateX(5px);
  }
  45% {
    -webkit-transform: translateX(-5px);
    -moz-transform: translateX(-5px);
    -o-transform: translateX(-5px);
    -ms-transform: translateX(-5px);
    transform: translateX(-5px);
  }
  60% {
    -webkit-transform: translateX(3px);
    -moz-transform: translateX(3px);
    -o-transform: translateX(3px);
    -ms-transform: translateX(3px);
    transform: translateX(3px);
  }
  75% {
    -webkit-transform: translateX(-3px);
    -moz-transform: translateX(-3px);
    -o-transform: translateX(-3px);
    -ms-transform: translateX(-3px);
    transform: translateX(-3px);
  }
  100% {
    -webkit-transform: translateX(0px);
    -moz-transform: translateX(0px);
    -o-transform: translateX(0px);
    -ms-transform: translateX(0px);
    transform: translateX(0px);
  }
}
@-o-keyframes shake {
  0% {
    -webkit-transform: translateX(7px);
    -moz-transform: translateX(7px);
    -o-transform: translateX(7px);
    -ms-transform: translateX(7px);
    transform: translateX(7px);
  }
  15% {
    -webkit-transform: translateX(-7px);
    -moz-transform: translateX(-7px);
    -o-transform: translateX(-7px);
    -ms-transform: translateX(-7px);
    transform: translateX(-7px);
  }
  30% {
    -webkit-transform: translateX(5px);
    -moz-transform: translateX(5px);
    -o-transform: translateX(5px);
    -ms-transform: translateX(5px);
    transform: translateX(5px);
  }
  45% {
    -webkit-transform: translateX(-5px);
    -moz-transform: translateX(-5px);
    -o-transform: translateX(-5px);
    -ms-transform: translateX(-5px);
    transform: translateX(-5px);
  }
  60% {
    -webkit-transform: translateX(3px);
    -moz-transform: translateX(3px);
    -o-transform: translateX(3px);
    -ms-transform: translateX(3px);
    transform: translateX(3px);
  }
  75% {
    -webkit-transform: translateX(-3px);
    -moz-transform: translateX(-3px);
    -o-transform: translateX(-3px);
    -ms-transform: translateX(-3px);
    transform: translateX(-3px);
  }
  100% {
    -webkit-transform: translateX(0px);
    -moz-transform: translateX(0px);
    -o-transform: translateX(0px);
    -ms-transform: translateX(0px);
    transform: translateX(0px);
  }
}
@keyframes shake {
  0% {
    -webkit-transform: translateX(7px);
    -moz-transform: translateX(7px);
    -o-transform: translateX(7px);
    -ms-transform: translateX(7px);
    transform: translateX(7px);
  }
  15% {
    -webkit-transform: translateX(-7px);
    -moz-transform: translateX(-7px);
    -o-transform: translateX(-7px);
    -ms-transform: translateX(-7px);
    transform: translateX(-7px);
  }
  30% {
    -webkit-transform: translateX(5px);
    -moz-transform: translateX(5px);
    -o-transform: translateX(5px);
    -ms-transform: translateX(5px);
    transform: translateX(5px);
  }
  45% {
    -webkit-transform: translateX(-5px);
    -moz-transform: translateX(-5px);
    -o-transform: translateX(-5px);
    -ms-transform: translateX(-5px);
    transform: translateX(-5px);
  }
  60% {
    -webkit-transform: translateX(3px);
    -moz-transform: translateX(3px);
    -o-transform: translateX(3px);
    -ms-transform: translateX(3px);
    transform: translateX(3px);
  }
  75% {
    -webkit-transform: translateX(-3px);
    -moz-transform: translateX(-3px);
    -o-transform: translateX(-3px);
    -ms-transform: translateX(-3px);
    transform: translateX(-3px);
  }
  100% {
    -webkit-transform: translateX(0px);
    -moz-transform: translateX(0px);
    -o-transform: translateX(0px);
    -ms-transform: translateX(0px);
    transform: translateX(0px);
  }
}
</style></head><body>
<div id="device-cards"></div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.min.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.min.js'></script>
<script >'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var App = function (_React$Component) {
  _inherits(App, _React$Component);

  function App() {
    _classCallCheck(this, App);

    return _possibleConstructorReturn(this, _React$Component.apply(this, arguments));
  }

  App.prototype.render = function render() {
    return React.createElement(
      'ul',
      { className: 'device-list' },
      this.props.data.map(function (device) {
        return React.createElement(DeviceCard, { device: device });
      })
    );
  };

  return App;
}(React.Component);

var DeviceCard = function (_React$Component2) {
  _inherits(DeviceCard, _React$Component2);

  function DeviceCard() {
    _classCallCheck(this, DeviceCard);

    var _this2 = _possibleConstructorReturn(this, _React$Component2.call(this));

    _this2.state = {
      isToggle: false
    };
    _this2.handleClick = _this2.handleClick.bind(_this2);
    return _this2;
  }

  DeviceCard.prototype.handleClick = function handleClick(e) {
    this.setState({ isToggle: !this.state.isToggle });
    console.log('clicked: ' + this.state.isToggle);
  };

  DeviceCard.prototype.render = function render() {
    return React.createElement(
      'li',
      { className: this.state.isToggle ? 'ui-card sidebar-open' : 'ui-card' },
      React.createElement(Device_section__info, { data: this.props.device }),
      React.createElement(Device_section__sideBarMenu, null),
      React.createElement(Device_action__toggleMenu, { toggleClick: this.handleClick })
    );
  };

  return DeviceCard;
}(React.Component);

var Device_section__info = function (_React$Component3) {
  _inherits(Device_section__info, _React$Component3);

  function Device_section__info() {
    _classCallCheck(this, Device_section__info);

    return _possibleConstructorReturn(this, _React$Component3.apply(this, arguments));
  }

  Device_section__info.prototype.render = function render() {
    return React.createElement(
      'section',
      { className: 'content' },
      React.createElement(Device_section__mastHead, { data: this.props.data }),
      React.createElement(Device_section__freeSpace, { data: this.props.data })
    );
  };

  return Device_section__info;
}(React.Component);

var Device_section__sideBarMenu = function (_React$Component4) {
  _inherits(Device_section__sideBarMenu, _React$Component4);

  function Device_section__sideBarMenu() {
    _classCallCheck(this, Device_section__sideBarMenu);

    return _possibleConstructorReturn(this, _React$Component4.apply(this, arguments));
  }

  Device_section__sideBarMenu.prototype.render = function render() {
    return React.createElement(
      'section',
      { className: 'sidebar' },
      React.createElement(
        'nav',
        null,
        React.createElement(Device_section__sideBarNav, null),
        React.createElement(Device_section__sideBarRemoveConnection, null)
      )
    );
  };

  return Device_section__sideBarMenu;
}(React.Component);

var Device_section__sideBarNav = function (_React$Component5) {
  _inherits(Device_section__sideBarNav, _React$Component5);

  function Device_section__sideBarNav() {
    _classCallCheck(this, Device_section__sideBarNav);

    return _possibleConstructorReturn(this, _React$Component5.apply(this, arguments));
  }

  Device_section__sideBarNav.prototype.render = function render() {
    return React.createElement(
      'ul',
      null,
      React.createElement(
        'li',
        null,
        React.createElement(
          'a',
          { href: '#' },
          React.createElement('i', { className: 'fa fa-wifi' }),
          'Wireless Settings'
        )
      ),
      React.createElement(
        'li',
        null,
        React.createElement(
          'a',
          { href: '#' },
          React.createElement('i', { className: 'fa fa-info-circle' }),
          'Device Information'
        )
      ),
      React.createElement(
        'li',
        null,
        React.createElement(
          'a',
          { href: '#' },
          React.createElement('i', { className: 'fa fa-photo' }),
          'Edit Photos'
        )
      ),
      React.createElement(
        'li',
        null,
        React.createElement(
          'a',
          { href: '#' },
          React.createElement('i', { className: 'fa fa-video-camera' }),
          'Edit Video'
        )
      )
    );
  };

  return Device_section__sideBarNav;
}(React.Component);

var Device_section__sideBarRemoveConnection = function (_React$Component6) {
  _inherits(Device_section__sideBarRemoveConnection, _React$Component6);

  function Device_section__sideBarRemoveConnection() {
    _classCallCheck(this, Device_section__sideBarRemoveConnection);

    return _possibleConstructorReturn(this, _React$Component6.apply(this, arguments));
  }

  Device_section__sideBarRemoveConnection.prototype.render = function render() {
    return React.createElement(
      'span',
      null,
      React.createElement(
        'div',
        { className: 'disconnect' },
        React.createElement(
          'a',
          { href: '#', className: 'btn btn-disconnect' },
          'Disconnect Device'
        )
      ),
      React.createElement(
        'div',
        { className: 'reauth' },
        React.createElement(
          'h3',
          null,
          'Re-enter your password'
        ),
        React.createElement('input', { type: 'password' }),
        React.createElement(
          'p',
          null,
          React.createElement(
            'a',
            { href: '#', className: 'btn btn-cancel js-reAuth' },
            'Cancel'
          )
        )
      )
    );
  };

  return Device_section__sideBarRemoveConnection;
}(React.Component);

var Device_action__toggleMenu = function (_React$Component7) {
  _inherits(Device_action__toggleMenu, _React$Component7);

  function Device_action__toggleMenu() {
    _classCallCheck(this, Device_action__toggleMenu);

    return _possibleConstructorReturn(this, _React$Component7.apply(this, arguments));
  }

  Device_action__toggleMenu.prototype.render = function render() {
    return React.createElement(
      'div',
      { className: 'toggle' },
      React.createElement(
        'a',
        { href: '#', onClick: this.props.toggleClick },
        React.createElement('i', { className: 'fa fa-cog' })
      )
    );
  };

  return Device_action__toggleMenu;
}(React.Component);

var Device_section__mastHead = function (_React$Component8) {
  _inherits(Device_section__mastHead, _React$Component8);

  function Device_section__mastHead() {
    _classCallCheck(this, Device_section__mastHead);

    return _possibleConstructorReturn(this, _React$Component8.apply(this, arguments));
  }

  Device_section__mastHead.prototype.render = function render() {
    var typeicon;
    switch (this.props.data.deviceType) {
      case 'ios':
        typeicon = 'fa fa-apple';
        break;
      case 'android':
        typeicon = 'fa fa-android';
        break;
      case 'windows':
        typeicon = 'fa fa-windows';
        break;
    }
    return React.createElement(
      'header',
      { className: 'masthead' },
      React.createElement(
        'div',
        { className: 'device-icon' },
        React.createElement('i', { className: typeicon })
      ),
      React.createElement(
        'h1',
        null,
        this.props.data.deviceName
      ),
      React.createElement(
        'p',
        { className: 'device-version' },
        this.props.data.sysVersion
      )
    );
  };

  return Device_section__mastHead;
}(React.Component);

var Device_section__freeSpace = function (_React$Component9) {
  _inherits(Device_section__freeSpace, _React$Component9);

  function Device_section__freeSpace() {
    _classCallCheck(this, Device_section__freeSpace);

    return _possibleConstructorReturn(this, _React$Component9.apply(this, arguments));
  }

  Device_section__freeSpace.prototype.render = function render() {
    var widthPhoto = Math.round((this.props.data.photoTotalSpace + this.props.data.videoTotalSpace + this.props.data.systemSpace) / this.props.data.availableSpace * 100);
    var widthVideo = Math.round((this.props.data.videoTotalSpace + this.props.data.systemSpace) / this.props.data.availableSpace * 100);
    var widthSystem = Math.round(this.props.data.systemSpace / this.props.data.availableSpace * 100);
    var usedSpacePhotoStyle = {
      width: widthPhoto + '%'
    };
    var usedSpaceVideoStyle = {
      width: widthVideo + '%'
    };
    var usedSpaceSystemStyle = {
      width: widthSystem + '%'
    };
    return React.createElement(
      'article',
      { className: 'device-info' },
      React.createElement(
        'div',
        { className: 'device-space' },
        React.createElement(
          'h3',
          null,
          'Storage Usage'
        ),
        React.createElement(
          'div',
          { className: 'available-space' },
          React.createElement('div', { className: 'used-space--photos', style: usedSpacePhotoStyle }),
          React.createElement('div', { className: 'used-space--videos', style: usedSpaceVideoStyle }),
          React.createElement('div', { className: 'used-space--system', style: usedSpaceSystemStyle })
        )
      ),
      React.createElement(
        'ul',
        { className: 'device-legend' },
        React.createElement(
          'li',
          null,
          React.createElement('i', { className: 'fa fa-circle system' }),
          ' Apps'
        ),
        React.createElement(
          'li',
          null,
          React.createElement('i', { className: 'fa fa-circle videos' }),
          ' Videos'
        ),
        React.createElement(
          'li',
          null,
          React.createElement('i', { className: 'fa fa-circle photos' }),
          ' Photos'
        ),
        React.createElement(
          'li',
          null,
          React.createElement('i', { className: 'fa fa-circle available' }),
          ' Available'
        )
      )
    );
  };

  return Device_section__freeSpace;
}(React.Component);

var device_data = [{
  deviceType: 'ios',
  deviceName: 'iPhone 7 Plus',
  sysVersion: '10.3',
  availableSpace: 32768,
  photoTotalSpace: 7453,
  videoTotalSpace: 5643,
  systemSpace: 4532
}, {
  deviceType: 'android',
  deviceName: 'Nexus 7',
  sysVersion: '6.0.1',
  availableSpace: 32768,
  photoTotalSpace: 8960,
  videoTotalSpace: 2394,
  systemSpace: 4093
}, {
  deviceType: 'android',
  deviceName: 'Galaxy Note 8',
  sysVersion: '7.0.0',
  availableSpace: 32768,
  photoTotalSpace: 4534,
  videoTotalSpace: 10234,
  systemSpace: 5943
}, {
  deviceType: 'ios',
  deviceName: 'iPad Pro',
  sysVersion: '10.3',
  availableSpace: 32768,
  photoTotalSpace: 5534,
  videoTotalSpace: 12234,
  systemSpace: 3452
}, {
  deviceType: 'windows',
  deviceName: 'lumia 830',
  sysVersion: '10.0.15063',
  availableSpace: 32768,
  photoTotalSpace: 2313,
  videoTotalSpace: 4345,
  systemSpace: 4532
}, {
  deviceType: 'ios',
  deviceName: 'iPhone 6s',
  sysVersion: '10.3',
  availableSpace: 32768,
  photoTotalSpace: 4096,
  videoTotalSpace: 6144,
  systemSpace: 3072
}];

ReactDOM.render(React.createElement(App, { data: device_data }), document.getElementById('device-cards'));
//# sourceURL=pen.js
</script>
</body></html>
