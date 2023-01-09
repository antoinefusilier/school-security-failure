# Docker Desktop Install & Init

Rappel un port est une entrée sur la carte réseau d'accès à la machine

## Linux Kernel Update Package

![Install start](assets/wsl_install_start.png)
![Install Weldone](assets/wsl_install_weldone.png)

- [Windows Tutorial Install](https://learn.microsoft.com/en-us/windows/wsl/install-manual)

Steps :


1. Open Power Shell at administrator and enter :
```PS
dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart

```
2. Enable VM Feature
```PS
dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
```
3. Install Linux Kernel Upadate Package

[Http Install](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi)
```

```

4. Set WSL2 as default version
```bash
wsl --set-default-version 2
```


# Start Doker