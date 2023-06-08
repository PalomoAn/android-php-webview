package com.example.simplifiedcodingtut;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class clientesActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Find the WebView by its unique ID
        WebView webView = findViewById(R.id.webclientes);

        // change ip here 
        webView.loadUrl("http://192.168.100.9:8080/consultas/main.php");

        // this will enable the javascript.
        webView.getSettings().setJavaScriptEnabled(true);

        // WebViewClient allows you to handle
        // onPageFinished and override Url loading.
        webView.setWebViewClient(new WebViewClient());
    }
}